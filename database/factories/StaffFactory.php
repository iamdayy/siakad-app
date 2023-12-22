<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => 977430,
            'full_name' => 'Aliana Dewi',
            'gender' => 'female',
            'born_place' => 'kotabaru',
            'born_date' => now(),
            'address' => 'bantul, rengong, yogyakarta',
            'city' => 'bantul',
            'phone' => '+6285973234332'
        ];
    }
}
