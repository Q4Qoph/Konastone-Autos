<?php

namespace Tests\Feature;

use App\Models\AuditLog;
use App\Models\Brand;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilamentPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_the_filament_login_page(): void
    {
        $this->get('/admin')
            ->assertRedirect('/admin/login');
    }

    public function test_non_staff_users_cannot_access_the_filament_panel(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/admin')
            ->assertForbidden();
    }

    public function test_staff_users_can_access_the_filament_panel(): void
    {
        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin')
            ->assertOk()
            ->assertSee('Available vehicles');

        $this->assertAuthenticated();
    }

    public function test_staff_users_can_access_the_filament_inventory_resource(): void
    {
        $vehicle = Vehicle::factory()->for(Brand::factory())->create([
            'model' => 'Panel Test Vehicle',
        ]);

        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/inventory')
            ->assertOk()
            ->assertSee($vehicle->model);
    }

    public function test_staff_users_can_open_the_filament_inventory_form(): void
    {
        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/inventory/create')
            ->assertOk()
            ->assertSee('Vehicle identity')
            ->assertSee('Price (KES)')
            ->assertSee('Initial gallery')
            ->assertSee('Vehicle images')
            ->assertSee('Cylinders')
            ->assertSee('Doors');
    }

    public function test_staff_users_can_open_the_vehicle_gallery_manager(): void
    {
        $vehicle = Vehicle::factory()->for(Brand::factory())->create();
        $vehicle->images()->create([
            'path' => 'vehicles/example.jpg',
            'is_cover' => true,
        ]);
        AuditLog::create([
            'vehicle_id' => $vehicle->id,
            'user_id' => User::factory()->create(['is_staff' => true])->id,
            'event' => 'updated',
            'old_values' => ['price' => 1000000],
            'new_values' => ['price' => 1100000],
        ]);

        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/inventory/'.$vehicle->slug.'/edit')
            ->assertOk()
            ->assertSee('Gallery')
            ->assertSee('Upload images')
            ->assertSee('Audit history');

        $this->assertDatabaseHas('audit_logs', [
            'vehicle_id' => $vehicle->id,
            'event' => 'updated',
        ]);
    }

    public function test_staff_users_can_open_the_filament_vehicle_view_by_slug(): void
    {
        $vehicle = Vehicle::factory()->for(Brand::factory())->create([
            'model' => 'Slug View Vehicle',
        ]);

        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/inventory/'.$vehicle->slug)
            ->assertOk()
            ->assertSee('Slug View Vehicle')
            ->assertSee('Gallery');
    }

    public function test_staff_users_can_access_the_filament_enquiry_resource(): void
    {
        $enquiry = Enquiry::factory()->create([
            'name' => 'Panel Enquiry Customer',
        ]);

        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/leads')
            ->assertOk()
            ->assertSee($enquiry->name);
    }

    public function test_staff_users_can_open_an_enquiry_follow_up_form(): void
    {
        $enquiry = Enquiry::factory()->create();

        $this->actingAs(User::factory()->create(['is_staff' => true]))
            ->get('/admin/leads/'.$enquiry->id.'/edit')
            ->assertOk()
            ->assertSee('Follow-up')
            ->assertSee('Internal notes');
    }
}
