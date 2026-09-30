<?php

namespace App\Filament\Resources\Users\Pages;

use App\Actions\Admin\SaveStaffAction;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return [...$data, 'role' => $data['is_owner'] ? 'owner' : 'sales'];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {
            return (new SaveStaffAction)->handle($data, auth()->user(), $record);
        } catch (ValidationException $exception) {
            throw ValidationException::withMessages(collect($exception->errors())
                ->mapWithKeys(fn (array $messages, string $key): array => ['data.'.$key => $messages])
                ->all());
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendInvitation')->label('Send password setup link')->requiresConfirmation()
                ->visible(fn (): bool => $this->getRecord()->is_staff)
                ->action(fn () => (new SaveStaffAction)->sendInvitation($this->getRecord(), auth()->user()))
                ->successNotificationTitle('Password setup link queued.'),
        ];
    }
}
