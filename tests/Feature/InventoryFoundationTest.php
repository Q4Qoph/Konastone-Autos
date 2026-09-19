<?php

namespace Tests\Feature;

use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryFoundationTest extends TestCase
{
    use RefreshDatabase;

    public function test_vehicle_relationships_and_scopes_work(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        $vehicle = Vehicle::factory()->create([
            'brand_id' => $brand->id,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
            'is_featured' => true,
        ]);

        $vehicle->images()->create([
            'path' => 'vehicles/example.webp',
            'sort_order' => 0,
            'is_cover' => true,
        ]);
        $vehicle->features()->create(['name' => 'Reverse camera']);

        $this->assertSame($brand->id, $vehicle->brand->id);
        $this->assertSame($vehicle->id, $vehicle->coverImage->vehicle_id);
        $this->assertSame('Reverse camera', $vehicle->features->first()->name);
        $this->assertTrue(Vehicle::available()->published()->featured()->whereKey($vehicle)->exists());
        $this->assertSame('decimal:2', $vehicle->getCasts()['price']);
    }

    public function test_seeders_create_expected_inventory_states(): void
    {
        $this->seed();

        $this->assertSame(10, Brand::count());
        $this->assertSame(22, Vehicle::count());
        $this->assertGreaterThan(0, Vehicle::where('status', VehicleStatus::Available)->count());
        $this->assertGreaterThan(0, Vehicle::where('status', VehicleStatus::Reserved)->count());
        $this->assertGreaterThan(0, Vehicle::where('status', VehicleStatus::Sold)->count());
        $this->assertGreaterThan(0, Vehicle::where('status', VehicleStatus::Draft)->count());
        $this->assertSame(0, Vehicle::whereNull('published_at')->where('status', '!=', VehicleStatus::Draft)->count());
    }

    public function test_inventory_pages_render_without_available_stock(): void
    {
        $this->get(route('inventory.index'))->assertOk()->assertSee('Inventory Listing');
        $this->get(route('inventory.grid'))->assertOk()->assertSee('Inventory Grid');
        $this->get(route('inventory.sold'))->assertOk()->assertSee('Sold Inventory');
        $this->get(route('inventory.index', ['brand' => 'Toyota']))->assertSee('No vehicles match your search.');
        $this->get(route('inventory.grid', ['body_type' => 'SUV']))->assertOk();
    }

    public function test_detail_route_uses_vehicle_slugs_and_rejects_unknown_vehicles(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        $vehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Harrier Dynamic',
            'year' => 2022,
            'price' => 4567000,
            'description' => 'A database-backed vehicle description.',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        $vehicle->images()->create([
            'path' => 'img/featured/single-inventory-gal-1.jpg',
            'is_cover' => true,
        ]);
        $vehicle->features()->create(['name' => 'Reverse camera']);

        $relatedVehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Related Dynamic',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Sold Related Dynamic',
            'status' => VehicleStatus::Sold,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.show', ['vehicle' => $vehicle->slug]))
            ->assertOk()
            ->assertSee('2022 Toyota Harrier Dynamic')
            ->assertSee('A database-backed vehicle description.')
            ->assertSee('KSh 4,567,000')
            ->assertSee('Reverse camera')
            ->assertSee('Related Dynamic')
            ->assertDontSee('Sold Related Dynamic')
            ->assertSee(route('inventory.show', $relatedVehicle));
        $this->get('/inventory/not-a-real-vehicle')->assertNotFound();
    }
}
