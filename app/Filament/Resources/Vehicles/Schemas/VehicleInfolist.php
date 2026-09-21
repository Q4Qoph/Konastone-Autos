<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VehicleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery')
                    ->schema([
                        ImageEntry::make('gallery')
                            ->label('Vehicle images')
                            ->state(fn (Vehicle $record): array => $record->images
                                ->map(fn (VehicleImage $image): string => $image->url('detail'))
                                ->all())
                            ->imageSize(180)
                            ->limit(12)
                            ->limitedRemainingText()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Vehicle')
                    ->schema([
                        TextEntry::make('brand.name')
                            ->label('Brand'),
                        TextEntry::make('model'),
                        TextEntry::make('trim')
                            ->placeholder('—'),
                        TextEntry::make('year'),
                        TextEntry::make('condition')
                            ->formatStateUsing(fn (mixed $state): string => ucfirst(str_replace('_', ' ', (string) $state))),
                        TextEntry::make('stock_number')
                            ->placeholder('—'),
                    ])
                    ->columns(3),
                Section::make('Pricing and availability')
                    ->schema([
                        TextEntry::make('price')
                            ->formatStateUsing(fn (mixed $state): string => 'KSh '.number_format((float) $state, 0)),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn (mixed $state): string => ucfirst($state?->value ?? (string) $state)),
                        TextEntry::make('location')
                            ->placeholder('—'),
                        TextEntry::make('published_at')
                            ->dateTime('d M Y H:i')
                            ->placeholder('Not published'),
                        TextEntry::make('sold_at')
                            ->dateTime('d M Y H:i')
                            ->placeholder('—'),
                    ])
                    ->columns(3),
                Section::make('Specifications')
                    ->schema([
                        TextEntry::make('engine')
                            ->placeholder('—'),
                        TextEntry::make('engine_capacity')
                            ->label('Engine capacity (cc)')
                            ->suffix(' cc')
                            ->placeholder('—'),
                        TextEntry::make('cylinders')
                            ->placeholder('—'),
                        TextEntry::make('doors')
                            ->placeholder('—'),
                        TextEntry::make('fuel_type')
                            ->placeholder('—'),
                        TextEntry::make('transmission')
                            ->placeholder('—'),
                        TextEntry::make('drivetrain')
                            ->placeholder('—'),
                        TextEntry::make('body_type')
                            ->placeholder('—'),
                        TextEntry::make('mileage')
                            ->label('Mileage (km)')
                            ->suffix(' km')
                            ->placeholder('—'),
                        TextEntry::make('exterior_color')
                            ->placeholder('—'),
                        TextEntry::make('interior_color')
                            ->placeholder('—'),
                        TextEntry::make('description')
                            ->placeholder('—')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }
}
