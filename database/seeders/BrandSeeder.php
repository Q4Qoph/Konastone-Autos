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
        foreach (['Toyota', 'Honda', 'Mazda', 'Mercedes-Benz', 'Subaru', 'Volvo'] as $order => $name) {
            Brand::updateOrCreate(
                ['slug' => str($name)->slug()],
                ['name' => $name, 'is_active' => true, 'sort_order' => $order + 1],
            );
        }
    }
}
