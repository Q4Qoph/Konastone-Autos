<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactEnquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_uses_the_new_route_and_template(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Our Contact Information')
            ->assertSee('Get In Touch');
    }

    public function test_contact_form_persists_an_enquiry(): void
    {
        $this->from(route('contact'))
            ->post(route('contact.store'), [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'number' => '+254700000000',
                'subject' => 'Vehicle enquiry',
                'message' => 'I would like more information.',
            ])
            ->assertRedirect(route('contact'))
            ->assertSessionHas('contact_status');

        $this->assertDatabaseHas('enquiries', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '+254700000000',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->post(route('contact.store'), [])
            ->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertSame(0, Enquiry::count());
    }
}
