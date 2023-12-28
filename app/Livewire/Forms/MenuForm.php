<?php

namespace App\Livewire\Forms;

use App\Models\Menu;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class MenuForm extends Form
{
    use WithFileUploads;

    public string $icon;
    public string $title;
    public int $description;
    public bool $level_id;
    public bool $to;

    public int $id;

    public function mountData(int $id) {
        $menu = Menu::find($id);
        $this->icon = $menu->icon;
        $this->title = $menu->title;
        $this->description = $menu->description;
        $this->level_id = $menu->level_id;
        $this->to = $menu->to;
    }

    public function create()
    {
        $menu = Menu::create($this->all());

    }

    public function edit()
    {
        $menu = Menu::find($this->id);

        $menu->update($this->all());
    }
}
