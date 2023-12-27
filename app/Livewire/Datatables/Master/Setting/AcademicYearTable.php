<?php

namespace App\Livewire\Datatables\Master\Setting;

use App\Models\AcademicYear;
use Arm092\LivewireDatatables\BooleanColumn;
use Arm092\LivewireDatatables\Column;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;

class AcademicYearTable extends LivewireDatatable
{
    public string|null|Model $model = AcademicYear::class;

    public string $actPath = 'master.setting.academic-year';
    public string $actName = 'Academic Year';
    public bool $create = true;

    public function delete($id): void
    {
        $classroom = AcademicYear::destroy($id);
    }
    public function getColumns(): array|Model
    {
        return [
            Column::name('id')
            ->label('Id'),
            Column::name('code')
            ->label('Code'),
            Column::name('semester')
            ->label('Semester'),
            BooleanColumn::name('status'),
            Column::callback('id', function ($id) {
                $model = AcademicYear::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
