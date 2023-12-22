<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collager>
 */
class CollagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gen_year' => 2010,
            'phase' => 3,
            // 'study_program_id' => 1,
            // 'status_id' => 1,
            // 'entrance_id'=> 3,
            // 'class_id' => 2,
            // 'group_id' => 6,
            'enter_date' => now(),
            'nim' => 104432299,
            'nik' => 3000101402040001,
            'nisn' => 30232132,
            'full_name' => 'Heru Hermanto',
            'semester' => 1,
            'gender' => 'male',
            'religion' => 'islam',
            'born_place' => 'temanggung',
            'born_date' => now(),
            'address' => 'Jl umar syahid no.33 ngadirejo temanggung',
            'ward' => 'ngadirejo',
            'city' => 'temanggung',
            'phone' => '+6285973234332',
            'dad_nik' => 3000101402040001,
            'dad_name' => 'Herman sulistyo',
            'mom_nik' => 3000101402040001,
            'mom_name' => 'Endah parwati',
        ];
    }
}
