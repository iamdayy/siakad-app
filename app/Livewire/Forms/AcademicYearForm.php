<?php

namespace App\Livewire\Forms;

use App\Models\AcademicYear;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AcademicYearForm extends Form
{
    public string $code;
    public string $title;
    public int $semester;
    public bool $status;

    public int $id;

    public function mountData(int $id) {
        $class = AcademicYear::find($id);
        $this->code = $class->code;
        $this->title = $class->title;
        $this->semester = $class->semester;
        $this->status = $class->status;
    }

    public function create()
    {
        $class = AcademicYear::create($this->only(['title', 'code', 'semester', 'status']));

    }

    public function edit()
    {
        $class = AcademicYear::find($this->id);

        $class->update($this->only(['title', 'code', 'semester', 'status']));
    }
}
