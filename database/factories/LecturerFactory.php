<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 923349,
            'nidn' => 10002343,
            'full_name' => 'Agus Salim',
            'gender' => 'male',
            'born_place' => 'Sukoharjo',
            'born_date' => now(),
            'address' => 'Sukoharjo no 33',
            'city' => 'Sukoharjo',
            'phone' => '+6285973234332',
            // 'study_program_id',
            // 'status_id',
        ];
    }
}
