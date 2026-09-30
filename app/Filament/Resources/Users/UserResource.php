<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Staff accounts';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('email')->email()->required()->maxLength(255)->unique(ignoreRecord: true),
            Select::make('role')->options(['owner' => 'Owner', 'sales' => 'Sales'])->default('sales')->required(),
            Toggle::make('is_staff')->label('Active staff access')->default(true)
                ->helperText('Disabling access signs the staff member out and blocks future logins.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('email')->searchable(),
            TextColumn::make('is_owner')->label('Role')->formatStateUsing(fn (bool $state): string => $state ? 'Owner' : 'Sales'),
            TextColumn::make('is_staff')->label('Access')->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Disabled')->badge(),
            TextColumn::make('email_verified_at')->label('Email verified')->dateTime()->placeholder('Pending'),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
