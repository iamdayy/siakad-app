<?php

namespace App\Livewire\Forms;

use App\Models\Entrance;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EntranceForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;

    public int $id;

    public function mountData(int $id) {
        $entrance = Entrance::find($id);
        $this->id = $entrance->id;
        $this->title = $entrance->title;
        $this->code = $entrance->code;
    }

    public function create()
    {
        $entrance = Entrance::create($this->only(['title', 'code']));

    }

    public function edit()
    {
        $entrance = Entrance::find($this->id);

        $entrance->update($this->only(['title', 'code']));
    }
}
