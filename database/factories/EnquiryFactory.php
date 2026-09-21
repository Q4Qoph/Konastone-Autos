<?php

namespace Database\Factories;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Enquiry> */
class EnquiryFactory extends Factory
{
    protected $model = Enquiry::class;

    public function definition(): array
    {
        return ['name' => fake()->name(), 'email' => fake()->safeEmail(), 'phone' => fake()->phoneNumber(), 'subject' => 'General enquiry', 'message' => fake()->paragraph(), 'status' => 'new', 'source' => 'contact'];
    }
}
