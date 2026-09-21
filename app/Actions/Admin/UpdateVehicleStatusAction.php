<?php

namespace App\Actions\Admin;

use App\Enums\VehicleStatus;
use App\Models\AuditLog;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UpdateVehicleStatusAction
{
    public function handle(Vehicle $vehicle, VehicleStatus $status, User $user): Vehicle
    {
        if (in_array($status, [VehicleStatus::Available, VehicleStatus::Reserved, VehicleStatus::Sold], true) && ! $vehicle->hasMinimumPublicGallery()) {
            throw ValidationException::withMessages([
                'status' => 'At least four images and one cover image are required before this vehicle can be published.',
            ]);
        }

        return DB::transaction(function () use ($vehicle, $status, $user): Vehicle {
            $oldValues = $vehicle->only(['status', 'published_at', 'sold_at']);

            $vehicle->update([
                'status' => $status,
                'published_at' => in_array($status, [VehicleStatus::Draft, VehicleStatus::Archived], true)
                    ? null
                    : ($vehicle->published_at ?? now()),
                'sold_at' => $status === VehicleStatus::Sold
                    ? ($vehicle->sold_at ?? now())
                    : null,
            ]);

            AuditLog::create([
                'vehicle_id' => $vehicle->id,
                'user_id' => $user->id,
                'event' => 'status_changed',
                'old_values' => $oldValues,
                'new_values' => $vehicle->only(['status', 'published_at', 'sold_at']),
            ]);

            return $vehicle;
        });
    }
}
