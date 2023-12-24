<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Collager;
use App\Models\Lecturer;
use App\Models\Level;
use App\Models\Menu;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::factory()->create();
        // Staff::factory()->create();
        // Collager::factory()->create();
        // Lecturer::factory()->create();
        // Menu::factory()->create();
        // Level::factory()->create();
        $this->call([
            RouteSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
