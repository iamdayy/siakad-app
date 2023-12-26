<?php

namespace App\Livewire\Forms;

use App\Models\LecturerStatus;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LecturerStatusForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;

    public int $id;

    public function mountData(int $id) {
        $lecturer_status = LecturerStatus::find($id);
        $this->id = $lecturer_status->id;
        $this->title = $lecturer_status->title;
        $this->code = $lecturer_status->code;
    }

    public function create()
    {
        $lecturer_status = LecturerStatus::create($this->only(['title', 'code']));

    }

    public function edit()
    {
        $lecturer_status = LecturerStatus::find($this->id);

        $lecturer_status->update($this->only(['title', 'code']));
    }
}
