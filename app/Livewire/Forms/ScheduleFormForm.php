<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\ScheduleForm;

class ScheduleFormForm extends Form
{
    public string $code;
    public string $title;
    public $start;
    public $end;
    public bool $status;

    public int $id;

    public function mountData(int $id) {
        $schedule_form = ScheduleForm::find($id);
        $this->code = $schedule_form->code;
        $this->title = $schedule_form->title;
        $this->start = $schedule_form->start;
        $this->end = $schedule_form->end;
        $this->status = $schedule_form->status;
    }

    public function create()
    {
        $schedule_form = ScheduleForm::create($this->all());

    }

    public function edit()
    {
        $schedule_form = ScheduleForm::find($this->id);

        $schedule_form->update($this->all());
    }
}
