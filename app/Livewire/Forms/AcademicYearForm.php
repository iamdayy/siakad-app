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
        $academic_year = AcademicYear::find($id);
        $this->code = $academic_year->code;
        $this->title = $academic_year->title;
        $this->semester = $academic_year->semester;
        $this->status = $academic_year->status;
    }

    public function create()
    {
        $academic_year = AcademicYear::create($this->only(['title', 'code', 'semester', 'status']));

    }

    public function edit()
    {
        $academic_year = AcademicYear::find($this->id);

        $academic_year->update($this->only(['title', 'code', 'semester', 'status']));
    }
}
