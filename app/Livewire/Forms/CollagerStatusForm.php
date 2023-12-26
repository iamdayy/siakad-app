<?php

namespace App\Livewire\Forms;

use App\Models\CollagerStatus;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CollagerStatusForm extends Form
{
    #[Validate('string|required')]
    public string $title;
    #[Validate('string|required')]
    public string $code;

    public int $id;

    public function mountData(int $id) {
        $collager_status = CollagerStatus::find($id);
        $this->id = $collager_status->id;
        $this->title = $collager_status->title;
        $this->code = $collager_status->code;
    }

    public function create()
    {
        $collager_status = CollagerStatus::create($this->only(['title', 'code']));

    }

    public function edit()
    {
        $collager_status = CollagerStatus::find($this->id);

        $collager_status->update($this->only(['title', 'code']));
    }
}
