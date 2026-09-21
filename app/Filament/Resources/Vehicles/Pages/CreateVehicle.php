<?php

namespace App\Filament\Resources\Vehicles\Pages;

use App\Actions\Admin\SaveVehicleAction;
use App\Actions\Admin\StoreVehicleImagesAction;
use App\Actions\Admin\UpdateVehicleStatusAction;
use App\Enums\VehicleStatus;
use App\Filament\Resources\Vehicles\VehicleResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        /** @var User $user */
        $user = auth()->user();

        $initialPaths = array_values(array_filter($data['initial_images'] ?? [], is_string(...)));
        $requestedStatus = VehicleStatus::from($data['status'] ?? VehicleStatus::Draft->value);

        unset($data['initial_images']);

        if ($initialPaths !== [] && $requestedStatus !== VehicleStatus::Draft) {
            $data['status'] = VehicleStatus::Draft->value;
        }

        $vehicle = (new SaveVehicleAction)->handle($data, $user);

        if ($initialPaths !== []) {
            $vehiclePaths = $this->moveInitialImages($initialPaths, $vehicle);

            (new StoreVehicleImagesAction)->handle($vehicle, $vehiclePaths, $user);
        }

        if ($requestedStatus !== VehicleStatus::Draft) {
            (new UpdateVehicleStatusAction)->handle($vehicle, $requestedStatus, $user);
        }

        return $vehicle;
    }

    protected function getRedirectUrl(): string
    {
        return VehicleResource::getUrl('edit', ['record' => $this->getRecord()]);
    }

    /**
     * @param  array<int, string>  $paths
     * @return array<int, string>
     */
    private function moveInitialImages(array $paths, Model $vehicle): array
    {
        $storage = Storage::disk('r2');
        $movedPaths = [];

        try {
            foreach ($paths as $path) {
                $targetPath = 'vehicles/'.$vehicle->getKey().'/'.Str::uuid().'-'.basename($path);

                if (! $storage->move($path, $targetPath)) {
                    throw new RuntimeException('The uploaded vehicle image could not be moved into its vehicle folder.');
                }

                $movedPaths[] = $targetPath;
            }

            return $movedPaths;
        } catch (Throwable $exception) {
            $storage->delete($movedPaths);

            throw $exception;
        }
    }
}
