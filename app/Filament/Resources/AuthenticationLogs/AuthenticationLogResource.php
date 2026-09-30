<?php

namespace App\Filament\Resources\AuthenticationLogs;

use App\Filament\Resources\AuthenticationLogs\Pages\ManageAuthenticationLogs;
use App\Models\AuthenticationLog;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AuthenticationLogResource extends Resource
{
    protected static ?string $model = AuthenticationLog::class;

    public static function canViewAny(): bool
    {
        return auth()->user()?->isOwner() ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('created_at')->dateTime()->sortable(),
            TextColumn::make('event')->badge()->searchable(),
            TextColumn::make('email')->searchable(),
            TextColumn::make('actor_id')->label('Changed by user ID')->placeholder('System'),
            TextColumn::make('ip_address')->label('IP address'),
            TextColumn::make('changes')->formatStateUsing(fn (mixed $state): string => json_encode($state) ?: '—')->wrap(),
        ])->filters([
            SelectFilter::make('event')->options([
                'login' => 'Login', 'login_failed' => 'Failed login', 'logout' => 'Logout',
                'legacy_account_removed' => 'Legacy account removed', 'staff_created' => 'Staff created', 'account_updated' => 'Account updated',
                'password_changed' => 'Password changed', 'password_reset' => 'Password reset', 'email_verified' => 'Email verified',
            ]),
        ])->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return ['index' => ManageAuthenticationLogs::route('/')];
    }
}
