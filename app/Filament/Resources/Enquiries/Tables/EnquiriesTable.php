<?php

namespace App\Filament\Resources\Enquiries\Tables;

use App\Models\Enquiry;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EnquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query->with(['vehicle', 'assignee']))
            ->columns([
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('vehicle.model')
                    ->label('Vehicle')
                    ->searchable()
                    ->placeholder('General enquiry')
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (mixed $state): string => ucfirst((string) $state))
                    ->sortable(),
                TextColumn::make('assignee.name')
                    ->label('Assigned to')
                    ->placeholder('Unassigned')
                    ->toggleable(),
                TextColumn::make('follow_up_at')
                    ->label('Follow-up')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'appointment' => 'Appointment',
                        'won' => 'Won',
                        'lost' => 'Lost',
                    ]),
                SelectFilter::make('assigned_to')
                    ->label('Assigned to')
                    ->relationship('assignee', 'name', modifyQueryUsing: fn ($query) => $query->where('is_staff', true))
                    ->searchable()
                    ->preload(),
                SelectFilter::make('vehicle_id')
                    ->label('Vehicle')
                    ->relationship('vehicle', 'model')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('source')
                    ->options(fn (): array => Enquiry::query()
                        ->whereNotNull('source')
                        ->distinct()
                        ->orderBy('source')
                        ->pluck('source', 'source')
                        ->all()),
                Filter::make('overdue')
                    ->label('Overdue follow-up')
                    ->query(fn (Builder $query): Builder => $query
                        ->whereNotNull('follow_up_at')
                        ->where('follow_up_at', '<', now())
                        ->whereNotIn('status', ['won', 'lost'])),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
