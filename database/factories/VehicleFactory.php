<?php

namespace Database\Factories;

use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory(),
            'model' => fake()->randomElement(['Land Cruiser Prado', 'Harrier', 'CX-5', 'Forester', 'GLC']),
            'trim' => fake()->optional()->randomElement(['TX.L', 'Premium', 'Turbo', 'Executive']),
            'slug' => fake()->unique()->slug(4),
            'year' => fake()->numberBetween(2017, 2025),
            'condition' => fake()->randomElement(['new', 'foreign_used', 'locally_used']),
            'stock_number' => 'KON-'.fake()->unique()->numerify('####'),
            'chassis_number' => null,
            'engine' => fake()->randomElement(['2.8L Diesel', '2.5L Petrol', '2.0L Turbo']),
            'engine_capacity' => fake()->randomElement([2000, 2500, 2800, 3000]),
            'fuel_type' => fake()->randomElement(['petrol', 'diesel', 'hybrid']),
            'transmission' => 'automatic',
            'drivetrain' => fake()->randomElement(['2wd', 'awd', '4wd']),
            'body_type' => fake()->randomElement(['suv', 'sedan', 'pickup']),
            'mileage' => fake()->numberBetween(0, 120000),
            'exterior_color' => fake()->randomElement(['Pearl White', 'Obsidian Black', 'Silver', 'Deep Blue']),
            'interior_color' => fake()->randomElement(['Black', 'Tan', 'Grey']),
            'price' => fake()->numberBetween(1800000, 15000000),
            'previous_price' => null,
            'currency' => 'KES',
            'description' => fake()->paragraph(),
            'location' => 'Nairobi',
            'status' => VehicleStatus::Available,
            'is_featured' => false,
            'is_negotiable' => fake()->boolean(35),
            'financing_available' => fake()->boolean(50),
            'published_at' => now(),
            'sold_at' => null,
        ];
    }
}
