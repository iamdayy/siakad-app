<?php

namespace Tests\Feature\Livewire\Master\Users\User;

use App\Livewire\Master\Users\User\TableActions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TableActionsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(TableActions::class)
            ->assertStatus(200);
    }
}
