<?php

namespace Database\Seeders;

use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleFeature;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            ['Toyota', 'Land Cruiser Prado', 'TX.L', 2022, 'foreign_used', 9800000, 'diesel', '4wd'],
            ['Toyota', 'Harrier', 'Premium', 2021, 'foreign_used', 6250000, 'petrol', 'awd'],
            ['Toyota', 'Crown', 'RS Advance', 2023, 'foreign_used', 7350000, 'hybrid', 'awd'],
            ['Toyota', 'Hilux', 'Double Cab', 2022, 'locally_used', 5850000, 'diesel', '4wd'],
            ['Mercedes-Benz', 'GLC', '300 4MATIC', 2022, 'foreign_used', 11200000, 'petrol', 'awd'],
            ['Mercedes-Benz', 'C-Class', 'C200', 2021, 'foreign_used', 6950000, 'petrol', 'rwd'],
            ['BMW', 'X5', 'xDrive40i', 2022, 'foreign_used', 13900000, 'petrol', 'awd'],
            ['BMW', '3 Series', '320i', 2020, 'locally_used', 5100000, 'petrol', 'rwd'],
            ['Audi', 'Q5', 'S line', 2021, 'foreign_used', 8250000, 'petrol', 'awd'],
            ['Volkswagen', 'Tiguan', 'R-Line', 2022, 'foreign_used', 6150000, 'petrol', 'awd'],
            ['Nissan', 'X-Trail', 'Ti', 2020, 'foreign_used', 3850000, 'petrol', 'awd'],
            ['Nissan', 'Navara', 'Pro-4X', 2022, 'foreign_used', 6350000, 'diesel', '4wd'],
            ['Mazda', 'CX-5', 'Signature', 2021, 'foreign_used', 4850000, 'petrol', 'awd'],
            ['Mazda', 'Demio', '13S Touring', 2019, 'foreign_used', 2180000, 'petrol', '2wd'],
            ['Subaru', 'Forester', 'XT EyeSight', 2020, 'foreign_used', 4250000, 'petrol', 'awd'],
            ['Subaru', 'Outback', 'Limited', 2021, 'foreign_used', 5350000, 'petrol', 'awd'],
            ['Land Rover', 'Discovery Sport', 'R-Dynamic', 2021, 'foreign_used', 8950000, 'diesel', 'awd'],
            ['Lexus', 'RX 450h', 'Luxury', 2020, 'foreign_used', 8750000, 'hybrid', 'awd'],
            ['Toyota', 'Vitz', 'F Safety Edition', 2019, 'foreign_used', 1850000, 'petrol', '2wd'],
            ['Nissan', 'Note', 'e-Power', 2020, 'foreign_used', 2450000, 'hybrid', '2wd'],
            ['Toyota', 'Fortuner', 'Legender', 2022, 'foreign_used', 7950000, 'diesel', '4wd'],
            ['BMW', 'X3', 'xDrive30i', 2022, 'foreign_used', 9250000, 'petrol', 'awd'],
        ];

        $images = [
            'img/featured/dealership-inventory-details-1.jpg',
            'img/featured/single-inventory-gal-1.jpg',
            'img/featured/single-inventory-gal-2.jpg',
            'img/featured/single-inventory-gal-3.jpg',
        ];

        foreach ($vehicles as $index => [$brandName, $model, $trim, $year, $condition, $price, $fuel, $drivetrain]) {
            $brand = Brand::where('slug', str($brandName)->slug())->firstOrFail();
            $stockNumber = 'KON-'.str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT);
            $status = match (true) {
                $index === 0 => VehicleStatus::Reserved,
                in_array($index, [3, 7, 13, 18], true) => VehicleStatus::Sold,
                in_array($index, [9, 20], true) => VehicleStatus::Draft,
                default => VehicleStatus::Available,
            };
            $publishedAt = $status === VehicleStatus::Draft ? null : now()->subDays($index + 1);
            $vehicle = Vehicle::updateOrCreate(
                ['stock_number' => $stockNumber],
                [
                    'brand_id' => $brand->id,
                    'model' => $model,
                    'trim' => $trim,
                    'slug' => str("{$year}-{$brandName}-{$model}-{$trim}-{$stockNumber}")->slug(),
                    'year' => $year,
                    'condition' => $condition,
                    'engine' => $fuel === 'diesel' ? '2.8L Diesel' : '2.0L Petrol',
                    'engine_capacity' => $fuel === 'diesel' ? 2800 : 2000,
                    'cylinders' => $fuel === 'diesel' ? 6 : 4,
                    'doors' => 5,
                    'fuel_type' => $fuel,
                    'transmission' => 'automatic',
                    'drivetrain' => $drivetrain,
                    'body_type' => in_array($model, ['Crown', 'C-Class', '3 Series', 'Demio', 'Vitz', 'Note'], true) ? 'sedan' : 'suv',
                    'mileage' => $status === VehicleStatus::Sold ? 48000 : 24000 + ($index * 1700),
                    'exterior_color' => ['Pearl White', 'Obsidian Black', 'Silver', 'Deep Blue'][$index % 4],
                    'interior_color' => $index % 2 ? 'Black' : 'Tan',
                    'price' => $price,
                    'previous_price' => $status === VehicleStatus::Sold ? $price + 250000 : null,
                    'currency' => 'KES',
                    'description' => "Well-presented {$year} {$brandName} {$model} {$trim} prepared for inspection at Konastone Autos and Imports.",
                    'location' => 'Nairobi',
                    'status' => $status,
                    'is_featured' => in_array($index, [0, 1, 4, 6, 12, 16], true),
                    'is_negotiable' => $status === VehicleStatus::Available,
                    'financing_available' => in_array($index, [0, 1, 4, 6, 8, 12, 16], true),
                    'published_at' => $publishedAt,
                    'sold_at' => $status === VehicleStatus::Sold ? now()->subDays($index + 2) : null,
                ],
            );

            $vehicle->images()->delete();
            foreach (array_slice($images, 0, ($index % 3) + 1) as $sortOrder => $path) {
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'path' => $path,
                    'alt_text' => "{$year} {$brandName} {$model} {$trim}",
                    'sort_order' => $sortOrder,
                    'is_cover' => $sortOrder === 0,
                ]);
            }

            $vehicle->features()->delete();
            foreach (['Reverse camera', 'Leather seats', 'Apple CarPlay'] as $feature) {
                VehicleFeature::create(['vehicle_id' => $vehicle->id, 'name' => $feature]);
            }
        }
    }
}
