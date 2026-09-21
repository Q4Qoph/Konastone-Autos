<?php

namespace App\Filament\Resources\Vehicles\Pages;

use App\Actions\Admin\SaveVehicleAction;
use App\Actions\Admin\UpdateVehicleStatusAction;
use App\Enums\VehicleStatus;
use App\Filament\Resources\Vehicles\VehicleResource;
use App\Models\User;
use App\Models\Vehicle;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class EditVehicle extends EditRecord
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            Action::make('changeStatus')
                ->label('Change status')
                ->icon(Heroicon::OutlinedArrowsRightLeft)
                ->schema([
                    Select::make('status')
                        ->options(collect(VehicleStatus::cases())->mapWithKeys(
                            fn (VehicleStatus $status): array => [$status->value => ucfirst($status->value)],
                        )->all())
                        ->required(),
                ])
                ->fillForm(fn (): array => ['status' => $this->getRecord()->status->value])
                ->action(function (array $data): void {
                    /** @var User $user */
                    $user = auth()->user();

                    (new UpdateVehicleStatusAction)->handle(
                        $this->getRecord(),
                        VehicleStatus::from($data['status']),
                        $user,
                    );
                })
                ->successNotificationTitle('Vehicle status updated.'),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        abort_unless($record instanceof Vehicle, 500);

        /** @var User $user */
        $user = auth()->user();

        return (new SaveVehicleAction)->handle($data, $user, $record);
    }
}
