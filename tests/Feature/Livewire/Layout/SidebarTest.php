<?php

namespace Tests\Feature\Livewire\Layout;

use App\Livewire\Layout\Sidebar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SidebarTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Sidebar::class)
            ->assertStatus(200);
    }
}
