<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Customer')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('phone')
                            ->placeholder('—'),
                    ])
                    ->columns(3),
                Section::make('Enquiry')
                    ->schema([
                        TextEntry::make('vehicle.model')
                            ->label('Vehicle')
                            ->placeholder('General enquiry'),
                        TextEntry::make('subject')
                            ->placeholder('No subject'),
                        TextEntry::make('message')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Follow-up')
                    ->schema([
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('assignee.name')
                            ->label('Assigned to')
                            ->placeholder('Unassigned'),
                        TextEntry::make('follow_up_at')
                            ->dateTime('d M Y H:i')
                            ->placeholder('No follow-up scheduled'),
                        TextEntry::make('internal_notes')
                            ->placeholder('No internal notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
