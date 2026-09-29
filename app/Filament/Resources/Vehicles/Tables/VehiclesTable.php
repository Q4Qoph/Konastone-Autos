<?php

namespace App\Filament\Resources\Vehicles\Tables;

use App\Models\Vehicle;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->extraAttributes(['class' => 'admin-vehicles-table'])
            ->modifyQueryUsing(fn (Builder $query): Builder => $query
                ->with(['brand', 'coverImage'])
                ->withCount('images'))
            ->columns([
                ImageColumn::make('coverImage.path')
                    ->label('Cover')
                    ->state(fn (Vehicle $record): string => $record->coverImage?->url('thumb')
                        ?? asset('assets/img/gallery/gallery-1-1.jpg'))
                    ->imageSize(56)
                    ->extraCellAttributes(['class' => 'vehicle-cover-cell'])
                    ->square()
                    ->toggleable(),
                TextColumn::make('vehicle_summary')
                    ->extraCellAttributes(['class' => 'vehicle-summary-cell'])
                    ->label('Vehicle')
                    ->state(fn (Vehicle $record): string => $record->model)
                    ->description(fn (Vehicle $record): string => $record->brand->name.' · '.$record->year)
                    ->weight(FontWeight::Bold)
                    ->hiddenFrom('sm'),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable()
                    ->visibleFrom('sm')
                    ->sortable(),
                TextColumn::make('model')
                    ->searchable()
                    ->visibleFrom('sm')
                    ->sortable()
                    ->wrap(),
                TextColumn::make('year')
                    ->visibleFrom('sm')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('stock_number')
                    ->label('Stock')
                    ->searchable()
                    ->placeholder('—')
                    ->visibleFrom('sm')
                    ->toggleable(),
                TextColumn::make('price')
                    ->extraCellAttributes(['class' => 'vehicle-price-cell'])
                    ->label('Price')
                    ->formatStateUsing(fn (mixed $state): string => 'KSh '.number_format((float) $state, 0))
                    ->sortable(),
                TextColumn::make('status')
                    ->extraCellAttributes(['class' => 'vehicle-status-cell'])
                    ->badge()
                    ->formatStateUsing(fn (mixed $state): string => ucfirst($state?->value ?? (string) $state))
                    ->sortable(),
                TextColumn::make('images_count')
                    ->label('Images')
                    ->formatStateUsing(fn (int $state): string => $state.'/12')
                    ->badge()
                    ->color(fn (int $state): string => $state >= 4 ? 'success' : 'warning')
                    ->visibleFrom('sm')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->visibleFrom('sm')
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
            ->filtersLayout(FiltersLayout::AboveContentCollapsible)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->stackedOnMobile()
            ->defaultSort('updated_at', 'desc');
    }
}
