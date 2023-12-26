<?php

namespace App\Livewire\Forms;

use App\Models\Clas;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClassForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;

    public int $id;

    public function mountData(int $id) {
        $class = Clas::find($id);
        $this->id = $class->id;
        $this->title = $class->title;
        $this->code = $class->code;
    }

    public function create()
    {
        $class = Clas::create($this->only(['title', 'code']));

    }

    public function edit()
    {
        $class = Clas::find($this->id);

        $class->update($this->only(['title', 'code']));
    }
}
