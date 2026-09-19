<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Toyota', 'Mercedes-Benz', 'BMW', 'Audi', 'Volkswagen', 'Nissan', 'Mazda', 'Subaru', 'Land Rover', 'Lexus'] as $order => $name) {
            Brand::updateOrCreate(
                ['slug' => str($name)->slug()],
                ['name' => $name, 'is_active' => true, 'sort_order' => $order + 1],
            );
        }
    }
}
