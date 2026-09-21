<?php

namespace App\Actions\Admin;

use App\Enums\VehicleStatus;
use App\Models\AuditLog;
use App\Models\Brand;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SaveVehicleAction
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function handle(array $data, User $user, ?Vehicle $vehicle = null): Vehicle
    {
        return DB::transaction(function () use ($data, $user, $vehicle): Vehicle {
            $brand = Brand::query()->findOrFail($data['brand_id']);
            $oldValues = $vehicle?->only(['brand_id', 'model', 'price', 'status', 'published_at', 'sold_at']);
            $status = VehicleStatus::from($data['status']);

            $data = [
                ...$data,
                'slug' => $vehicle?->slug ?? $this->uniqueSlug($data, $brand),
                'currency' => 'KES',
                'is_featured' => (bool) ($data['is_featured'] ?? false),
                'is_negotiable' => (bool) ($data['is_negotiable'] ?? false),
                'financing_available' => (bool) ($data['financing_available'] ?? false),
                'published_at' => in_array($status, [VehicleStatus::Draft, VehicleStatus::Archived], true)
                    ? null
                    : ($vehicle?->published_at ?? now()),
                'sold_at' => $status === VehicleStatus::Sold
                    ? ($vehicle?->sold_at ?? now())
                    : null,
            ];

            $savedVehicle = $vehicle ?? new Vehicle;

            if ($vehicle === null && $status !== VehicleStatus::Draft) {
                throw ValidationException::withMessages([
                    'status' => 'Create the vehicle as a draft, upload at least four images, then publish it.',
                ]);
            }

            if ($vehicle !== null && in_array($status, [VehicleStatus::Available, VehicleStatus::Reserved, VehicleStatus::Sold], true) && ! $vehicle->hasMinimumPublicGallery()) {
                throw ValidationException::withMessages([
                    'status' => 'At least four images and one cover image are required before this vehicle can be published.',
                ]);
            }

            $savedVehicle->fill($data);
            $savedVehicle->save();

            if ($vehicle !== null) {
                AuditLog::create([
                    'vehicle_id' => $savedVehicle->id,
                    'user_id' => $user->id,
                    'event' => 'updated',
                    'old_values' => $oldValues,
                    'new_values' => $savedVehicle->only(['brand_id', 'model', 'price', 'status', 'published_at', 'sold_at']),
                ]);
            }

            return $savedVehicle;
        });
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function uniqueSlug(array $data, Brand $brand): string
    {
        $baseSlug = Str::slug(implode('-', array_filter([
            $data['year'],
            $brand->name,
            $data['model'],
            $data['trim'] ?? null,
        ])));
        $slug = $baseSlug;
        $suffix = 2;

        while (Vehicle::query()->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$suffix++;
        }

        return $slug;
    }
}
