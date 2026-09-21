<?php

namespace Tests\Feature;

use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_only_published_available_vehicles_from_active_brands(): void
    {
        $activeBrand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        $inactiveBrand = Brand::factory()->create(['is_active' => false]);
        $visibleVehicle = Vehicle::factory()->for($activeBrand)->create([
            'model' => 'Harrier',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        $draftVehicle = Vehicle::factory()->for($activeBrand)->create([
            'model' => 'Draft model',
            'status' => VehicleStatus::Draft,
            'published_at' => null,
        ]);
        $inactiveVehicle = Vehicle::factory()->for($inactiveBrand)->create([
            'model' => 'Inactive brand model',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.index'))
            ->assertSee('Harrier')
            ->assertDontSee(route('inventory.show', $draftVehicle))
            ->assertDontSee(route('inventory.show', $inactiveVehicle))
            ->assertSee(route('inventory.show', $visibleVehicle));
    }

    public function test_inventory_cards_fall_back_to_the_first_gallery_image_when_cover_is_missing(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        $vehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Gallery Fallback',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        $vehicle->images()->create([
            'path' => 'img/featured/featured-1-2.jpg',
            'sort_order' => 0,
            'is_cover' => false,
        ]);

        $this->get(route('inventory.index'))
            ->assertOk()
            ->assertSee(asset('assets/img/featured/featured-1-2.jpg'));
    }

    public function test_filters_available_inventory_by_brand_and_price(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Harrier',
            'price' => 4500000,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        $outsidePriceRangeVehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Land Cruiser',
            'price' => 9000000,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.index', ['brand' => 'toyota', 'max_price' => 5000000]))
            ->assertSee('Harrier')
            ->assertDontSee(route('inventory.show', $outsidePriceRangeVehicle));
    }

    public function test_rejects_reversed_price_ranges(): void
    {
        $this->get(route('inventory.index', ['min_price' => 5000000, 'max_price' => 1000000]))
            ->assertRedirect(route('inventory.index'))
            ->assertSessionHasErrors('max_price');
    }

    public function test_grid_route_uses_available_inventory_query(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Crown',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.grid', ['brand' => 'toyota']))
            ->assertOk()
            ->assertSee('Crown')
            ->assertSee('Showing 1–1 of 1 vehicles');
    }

    public function test_inventory_filter_controls_submit_supported_query_parameters(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Filterable Crown',
            'body_type' => 'suv',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.index'))
            ->assertOk()
            ->assertSee('name="drivetrain"', false)
            ->assertSee('name="transmission"', false)
            ->assertSee('name="fuel_type"', false)
            ->assertSee('name="min_price"', false)
            ->assertSee('value="toyota"', false)
            ->assertSee('Filterable Crown');
    }

    public function test_inventory_can_filter_by_cylinders_and_doors(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        $matchingVehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Six Cylinder SUV',
            'cylinders' => 6,
            'doors' => 5,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);
        $nonMatchingVehicle = Vehicle::factory()->for($brand)->create([
            'model' => 'Four Cylinder SUV',
            'cylinders' => 4,
            'doors' => 5,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.index', ['cylinders' => 6, 'doors' => 5]))
            ->assertSee($matchingVehicle->model)
            ->assertDontSee(route('inventory.show', $nonMatchingVehicle));
    }

    public function test_sold_route_only_renders_published_sold_inventory(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Sold Crown',
            'status' => VehicleStatus::Sold,
            'published_at' => now()->subWeek(),
            'sold_at' => now()->subDay(),
        ]);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Available Crown',
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('inventory.sold'))
            ->assertOk()
            ->assertSee('Sold Crown')
            ->assertDontSee('Available Crown');
    }

    public function test_homepage_renders_published_featured_inventory(): void
    {
        $brand = Brand::factory()->create(['name' => 'Toyota', 'slug' => 'toyota']);
        Vehicle::factory()->for($brand)->create([
            'model' => 'Featured Crown',
            'is_featured' => true,
            'status' => VehicleStatus::Available,
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Featured Crown');
    }
}
