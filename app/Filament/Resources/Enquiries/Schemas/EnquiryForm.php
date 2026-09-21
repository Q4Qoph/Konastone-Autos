<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Customer')
                    ->schema([
                        TextInput::make('name')
                            ->disabled(),
                        TextInput::make('email')
                            ->email()
                            ->disabled(),
                        TextInput::make('phone')
                            ->tel()
                            ->disabled(),
                        TextInput::make('subject')
                            ->disabled(),
                    ])
                    ->columns(2),
                Section::make('Enquiry')
                    ->schema([
                        Select::make('vehicle_id')
                            ->relationship('vehicle', 'model')
                            ->searchable()
                            ->preload()
                            ->disabled(),
                        TextInput::make('source')
                            ->disabled(),
                        Textarea::make('message')
                            ->rows(6)
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Follow-up')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'appointment' => 'Appointment',
                                'won' => 'Won',
                                'lost' => 'Lost',
                            ])
                            ->required(),
                        Select::make('assigned_to')
                            ->label('Assigned to')
                            ->relationship('assignee', 'name', modifyQueryUsing: fn ($query) => $query->where('is_staff', true))
                            ->searchable()
                            ->preload(),
                        DateTimePicker::make('follow_up_at')
                            ->seconds(false),
                        Textarea::make('internal_notes')
                            ->rows(5)
                            ->maxLength(5000)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
