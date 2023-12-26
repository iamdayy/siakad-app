<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;

    public int $id;

    public function mountData(int $id) {
        $group = Group::find($id);
        $this->id = $group->id;
        $this->title = $group->title;
        $this->code = $group->code;
    }

    public function create()
    {
        $group = Group::create($this->only(['title', 'code']));

    }

    public function edit()
    {
        $group = Group::find($this->id);

        $group->update($this->only(['title', 'code']));
    }
}
