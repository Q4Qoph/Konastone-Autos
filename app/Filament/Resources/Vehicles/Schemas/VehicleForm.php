<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\Enums\VehicleStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Vehicle identity')
                    ->schema([
                        Select::make('brand_id')
                            ->label('Brand')
                            ->relationship('brand', 'name', modifyQueryUsing: fn ($query) => $query->where('is_active', true))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('model')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('trim')
                            ->maxLength(255),
                        TextInput::make('year')
                            ->integer()
                            ->minValue(1900)
                            ->maxValue(now()->year + 1)
                            ->required(),
                        Select::make('condition')
                            ->options([
                                'new' => 'New',
                                'foreign_used' => 'Foreign used',
                                'locally_used' => 'Locally used',
                            ])
                            ->required(),
                        TextInput::make('stock_number')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ])
                    ->columns(2),
                Section::make('Pricing and availability')
                    ->schema([
                        TextInput::make('price')
                            ->label('Price (KES)')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01)
                            ->required(),
                        TextInput::make('previous_price')
                            ->label('Previous price (KES)')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01),
                        Select::make('status')
                            ->options(self::statusOptions())
                            ->default(VehicleStatus::Draft->value)
                            ->required()
                            ->rule(Rule::enum(VehicleStatus::class)),
                        TextInput::make('location')
                            ->maxLength(255),
                        Toggle::make('is_featured')
                            ->label('Featured'),
                        Toggle::make('is_negotiable')
                            ->label('Negotiable'),
                        Toggle::make('financing_available')
                            ->label('Financing available'),
                    ])
                    ->columns(2),
                Section::make('Specifications')
                    ->schema([
                        TextInput::make('engine')
                            ->maxLength(255),
                        TextInput::make('engine_capacity')
                            ->label('Engine capacity (cc)')
                            ->integer()
                            ->minValue(1)
                            ->maxValue(20000),
                        TextInput::make('cylinders')
                            ->integer()
                            ->minValue(1)
                            ->maxValue(16),
                        TextInput::make('doors')
                            ->integer()
                            ->minValue(1)
                            ->maxValue(8),
                        TextInput::make('fuel_type')
                            ->maxLength(255),
                        TextInput::make('transmission')
                            ->maxLength(255),
                        TextInput::make('drivetrain')
                            ->maxLength(255),
                        TextInput::make('body_type')
                            ->maxLength(255),
                        TextInput::make('mileage')
                            ->label('Mileage (km)')
                            ->integer()
                            ->minValue(0),
                        TextInput::make('exterior_color')
                            ->maxLength(255),
                        TextInput::make('interior_color')
                            ->maxLength(255),
                    ])
                    ->columns(3),
                Section::make('Initial gallery')
                    ->description('Optional during creation. You can manage the gallery after saving the vehicle.')
                    ->schema([
                        FileUpload::make('initial_images')
                            ->label('Vehicle images')
                            ->multiple()
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120)
                            ->maxFiles(12)
                            ->rules(['dimensions:max_width=4000,max_height=4000'])
                            ->disk('r2')
                            ->directory('vehicles/pending')
                            ->helperText('You can upload up to 12 images. The first image becomes the cover image.'),
                    ])
                    ->visibleOn('create')
                    ->columnSpanFull(),
                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->rows(6)
                            ->maxLength(10000)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    /**
     * @return array<string, string>
     */
    private static function statusOptions(): array
    {
        return collect(VehicleStatus::cases())
            ->mapWithKeys(fn (VehicleStatus $status): array => [$status->value => ucfirst($status->value)])
            ->all();
    }
}
