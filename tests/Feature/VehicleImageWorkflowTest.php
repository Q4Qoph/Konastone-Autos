<?php

namespace Tests\Feature;

use App\Actions\Admin\StoreVehicleImagesAction;
use App\Actions\Admin\UpdateVehicleStatusAction;
use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class VehicleImageWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_staff_can_store_vehicle_image_metadata_for_four_r2_objects(): void
    {
        Storage::fake('r2');
        $staff = User::factory()->create(['is_staff' => true]);
        $vehicle = Vehicle::factory()->for(Brand::factory())->create([
            'status' => VehicleStatus::Draft,
            'published_at' => null,
        ]);
        $paths = collect(['front.jpg', 'rear.jpg', 'interior.jpg', 'dashboard.jpg'])
            ->map(function (string $filename) use ($vehicle): string {
                $path = 'vehicles/'.$vehicle->id.'/'.$filename;
                Storage::disk('r2')->put($path, 'image-content');

                return $path;
            })
            ->all();

        (new StoreVehicleImagesAction)->handle($vehicle, $paths, $staff);

        $this->assertDatabaseCount('vehicle_images', 4);
        $this->assertDatabaseHas('vehicle_images', [
            'vehicle_id' => $vehicle->id,
            'disk' => 'r2',
            'path' => $paths[0],
            'is_cover' => true,
            'uploaded_by' => $staff->id,
        ]);
        $this->assertSame(4, $vehicle->images()->count());
        $this->assertSame($paths[0], $vehicle->images()->firstOrFail()->path);
    }

    public function test_public_status_requires_four_images_and_a_cover(): void
    {
        $staff = User::factory()->create(['is_staff' => true]);
        $vehicle = Vehicle::factory()->for(Brand::factory())->create([
            'status' => VehicleStatus::Draft,
            'published_at' => null,
        ]);

        $this->expectException(ValidationException::class);

        (new UpdateVehicleStatusAction)->handle($vehicle, VehicleStatus::Available, $staff);
    }

    public function test_legacy_theme_image_paths_continue_to_resolve(): void
    {
        $vehicle = Vehicle::factory()->for(Brand::factory())->create();
        $image = $vehicle->images()->create([
            'path' => 'img/featured/featured-1-1.jpg',
            'disk' => 'r2',
            'is_cover' => true,
        ]);

        $this->assertSame(asset('assets/img/featured/featured-1-1.jpg'), $image->url());
    }
}
