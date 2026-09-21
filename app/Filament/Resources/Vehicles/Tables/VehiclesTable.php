<?php

namespace App\Filament\Resources\Vehicles\Tables;

use App\Models\Vehicle;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query
                ->with(['brand', 'coverImage'])
                ->withCount('images'))
            ->columns([
                ImageColumn::make('coverImage.path')
                    ->label('Cover')
                    ->state(fn (Vehicle $record): string => $record->coverImage?->url('thumb')
                        ?? asset('assets/img/gallery/gallery-1-1.jpg'))
                    ->imageSize(48)
                    ->square()
                    ->toggleable(),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('model')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('year')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('stock_number')
                    ->label('Stock')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->formatStateUsing(fn (mixed $state): string => 'KSh '.number_format((float) $state, 0))
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (mixed $state): string => ucfirst($state?->value ?? (string) $state))
                    ->sortable(),
                TextColumn::make('images_count')
                    ->label('Images')
                    ->formatStateUsing(fn (int $state): string => $state.'/12')
                    ->badge()
                    ->color(fn (int $state): string => $state >= 4 ? 'success' : 'warning')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'available' => 'Available',
                        'reserved' => 'Reserved',
                        'sold' => 'Sold',
                        'archived' => 'Archived',
                    ]),
                SelectFilter::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('condition')
                    ->options([
                        'new' => 'New',
                        'foreign_used' => 'Foreign used',
                        'locally_used' => 'Locally used',
                    ]),
                SelectFilter::make('body_type')
                    ->options(fn (): array => Vehicle::query()
                        ->whereNotNull('body_type')
                        ->distinct()
                        ->orderBy('body_type')
                        ->pluck('body_type', 'body_type')
                        ->all()),
                SelectFilter::make('location')
                    ->options(fn (): array => Vehicle::query()
                        ->whereNotNull('location')
                        ->distinct()
                        ->orderBy('location')
                        ->pluck('location', 'location')
                        ->all()),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}
