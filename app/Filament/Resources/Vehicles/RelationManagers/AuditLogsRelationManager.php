<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AuditLogsRelationManager extends RelationManager
{
    protected static bool $isLazy = false;

    protected static string $relationship = 'auditLogs';

    protected static ?string $title = 'Audit history';

    public function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('event'),
                TextEntry::make('user.name')->label('Changed by'),
                TextEntry::make('created_at')->dateTime('d M Y H:i'),
                TextEntry::make('old_values')
                    ->label('Previous values')
                    ->formatStateUsing(fn (mixed $state): string => json_encode($state, JSON_PRETTY_PRINT) ?: '—')
                    ->columnSpanFull(),
                TextEntry::make('new_values')
                    ->label('New values')
                    ->formatStateUsing(fn (mixed $state): string => json_encode($state, JSON_PRETTY_PRINT) ?: '—')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('event')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Changed')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('event')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                TextColumn::make('user.name')
                    ->label('Changed by')
                    ->placeholder('System'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
