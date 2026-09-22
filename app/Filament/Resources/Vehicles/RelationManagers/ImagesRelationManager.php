<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use App\Actions\Admin\StoreVehicleImagesAction;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesRelationManager extends RelationManager
{
    protected static bool $isLazy = false;

    protected static string $relationship = 'images';

    protected static ?string $title = 'Gallery';

    public function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('path')
                    ->label('Stored path'),
                TextEntry::make('alt_text')
                    ->label('Alt text')
                    ->placeholder('—'),
                TextEntry::make('original_name')
                    ->label('Original filename')
                    ->placeholder('—'),
                TextEntry::make('mime_type')
                    ->label('File type')
                    ->placeholder('—'),
                TextEntry::make('file_size')
                    ->label('File size')
                    ->formatStateUsing(fn (?int $state): string => $state === null ? '—' : number_format($state / 1024, 1).' KB'),
                TextEntry::make('dimensions')
                    ->label('Dimensions')
                    ->state(fn (VehicleImage $record): string => $record->width && $record->height
                        ? "{$record->width} × {$record->height} px"
                        : '—'),
                TextEntry::make('disk')
                    ->label('Storage disk'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('path')
            ->columns([
                ImageColumn::make('image_preview')
                    ->label('Image')
                    ->state(fn (VehicleImage $record): string => $record->url('thumb'))
                    ->imageSize(72)
                    ->square()
                    ->alt(fn (VehicleImage $record): string => $record->alt_text ?? 'Vehicle image'),
                TextColumn::make('path')
                    ->label('Stored path')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('sort_order')
                    ->label('Display order')
                    ->formatStateUsing(fn (int $state): int => $state + 1),
            ])
            ->headerActions([
                Action::make('uploadImages')
                    ->label('Upload images')
                    ->icon(Heroicon::OutlinedArrowUpTray)
                    ->schema([
                        FileUpload::make('images')
                            ->label('Vehicle images')
                            ->multiple()
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120)
                            ->maxFiles(12)
                            ->rules(['dimensions:max_width=4000,max_height=4000'])
                            ->disk('r2')
                            ->directory(fn (): string => 'vehicles/'.$this->vehicle()->getKey())
                            ->required(),
                    ])
                    ->action(function (array $data): void {
                        /** @var User $user */
                        $user = auth()->user();

                        (new StoreVehicleImagesAction)->handle(
                            $this->vehicle(),
                            $data['images'] ?? [],
                            $user,
                        );
                    })
                    ->successNotificationTitle('Images uploaded.'),
            ])
            ->recordActions([
                Action::make('moveUp')
                    ->label('Move up')
                    ->icon(Heroicon::OutlinedArrowUp)
                    ->iconButton()
                    ->color('gray')
                    ->visible(fn (VehicleImage $record): bool => ! $record->is_cover)
                    ->action(function (VehicleImage $record): void {
                        $this->moveImage($record, -1);
                    }),
                Action::make('moveDown')
                    ->label('Move down')
                    ->icon(Heroicon::OutlinedArrowDown)
                    ->iconButton()
                    ->color('gray')
                    ->visible(fn (VehicleImage $record): bool => ! $record->is_cover)
                    ->action(function (VehicleImage $record): void {
                        $this->moveImage($record, 1);
                    }),
                Action::make('setCover')
                    ->label('Make cover')
                    ->icon(Heroicon::OutlinedStar)
                    ->color('warning')
                    ->visible(fn (VehicleImage $record): bool => ! $record->is_cover)
                    ->action(function (VehicleImage $record): void {
                        $this->setCover($record);
                    })
                    ->successNotificationTitle('Cover image updated.'),
                Action::make('deleteImage')
                    ->label('Delete')
                    ->icon(Heroicon::OutlinedTrash)
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (VehicleImage $record): void {
                        $this->deleteImage($record);
                    })
                    ->successNotificationTitle('Image deleted.'),
            ])
            ->reorderRecordsTriggerAction(fn (Action $action, bool $isReordering): Action => $action
                ->label($isReordering ? 'Finish arranging' : 'Arrange images'))
            ->reorderable('sort_order')
            ->afterReordering(function (array $order): void {
                DB::transaction(function (): void {
                    $this->keepCoverFirst($this->vehicle());
                });
            });
    }

    private function setCover(VehicleImage $image): void
    {
        $vehicle = $this->vehicle();

        abort_unless($image->vehicle_id === $vehicle->id, 404);

        DB::transaction(function () use ($vehicle, $image): void {
            $vehicle->images()->update(['is_cover' => false]);
            $image->update(['is_cover' => true]);
            $this->keepCoverFirst($vehicle);
        });
    }

    private function keepCoverFirst(Vehicle $vehicle): void
    {
        $images = $vehicle->images()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $coverImage = $images->firstWhere('is_cover', true);

        if (! $coverImage) {
            return;
        }

        $orderedImages = $images
            ->reject(fn (VehicleImage $image): bool => $image->is($coverImage))
            ->prepend($coverImage)
            ->values();

        foreach ($orderedImages as $sortOrder => $image) {
            if ($image->sort_order !== $sortOrder) {
                $image->update(['sort_order' => $sortOrder]);
            }
        }
    }

    private function moveImage(VehicleImage $image, int $direction): void
    {
        $vehicle = $this->vehicle();

        abort_unless($image->vehicle_id === $vehicle->id, 404);

        DB::transaction(function () use ($direction, $image, $vehicle): void {
            $images = $vehicle->images()
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
            $coverImage = $images->firstWhere('is_cover', true);
            $galleryImages = $images
                ->reject(fn (VehicleImage $record): bool => $coverImage && $record->is($coverImage))
                ->values();
            $currentIndex = $galleryImages->search(fn (VehicleImage $record): bool => $record->is($image));
            $targetIndex = is_int($currentIndex) ? $currentIndex + $direction : -1;

            if ($targetIndex < 0 || $targetIndex >= $galleryImages->count()) {
                return;
            }

            $galleryImages->splice($currentIndex, 1);
            $galleryImages->splice($targetIndex, 0, [$image]);
            $orderedImages = $coverImage ? $galleryImages->prepend($coverImage) : $galleryImages;

            foreach ($orderedImages->values() as $sortOrder => $record) {
                if ($record->sort_order !== $sortOrder) {
                    $record->update(['sort_order' => $sortOrder]);
                }
            }
        });
    }

    private function deleteImage(VehicleImage $image): void
    {
        $vehicle = $this->vehicle();

        abort_unless($image->vehicle_id === $vehicle->id, 404);

        $wasCover = $image->is_cover;
        $image->delete();

        $this->deleteStoredFiles($image);

        if ($wasCover && ($replacement = $vehicle->images()->first())) {
            $replacement->update(['is_cover' => true]);
        }
    }

    private function vehicle(): Vehicle
    {
        abort_unless($this->ownerRecord instanceof Vehicle, 500);

        return $this->ownerRecord;
    }

    private function deleteStoredFiles(VehicleImage $image): void
    {
        if (str_starts_with($image->path, 'img/')) {
            return;
        }

        $paths = array_values(array_unique([
            $image->path,
            ...array_values($image->variants ?? []),
        ]));

        Storage::disk($image->disk ?: 'public')->delete($paths);
    }
}
