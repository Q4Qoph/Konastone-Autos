<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleImage>
 */
class VehicleImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'path' => 'vehicles/placeholder.webp',
            'alt_text' => 'Vehicle image',
            'sort_order' => 0,
            'is_cover' => true,
        ];
    }
}
