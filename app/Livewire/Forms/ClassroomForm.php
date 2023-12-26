<?php

namespace App\Livewire\Forms;

use App\Models\Classroom;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClassroomForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;
    #[Validate('required|numeric')]
    public string $capacity;

    public int $id;

    public function mountData(int $id) {
        $classroom = Classroom::find($id);
        $this->id = $classroom->id;
        $this->title = $classroom->title;
        $this->code = $classroom->code;
        $this->capacity = $classroom->capacity;
    }

    public function create()
    {
        $classroom = Classroom::create($this->only(['title', 'code', 'capacity']));

    }

    public function edit()
    {
        $classroom = Classroom::find($this->id);

        $classroom->update($this->only(['title', 'code', 'capacity']));
    }
}
