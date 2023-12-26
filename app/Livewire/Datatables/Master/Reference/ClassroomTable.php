<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Classroom;
use Arm092\LivewireDatatables\Column;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;

class ClassroomTable extends LivewireDatatable
{
    public string|null|Model $model = Classroom::class;
    public string $actPath = 'master.reference.classroom';
    public string $actName = 'Classroom';
    public bool $create = true;

    public function delete($id): void
    {
        $classroom = Classroom::destroy($id);
    }

    public function getColumns(): array|Model
    {
        return [
            Column::name('id')
            ->label('Id'),
            Column::name('code')
            ->label('Code'),
            Column::name('title')
            ->label('Title'),
            Column::name('capacity')
            ->name('Capacity'),
            Column::callback('id', function ($id) {
                $model = Classroom::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
