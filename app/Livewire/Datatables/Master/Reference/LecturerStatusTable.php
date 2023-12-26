<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\LecturerStatus;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class LecturerStatusTable extends LivewireDatatable
{
    public string|null|Model $model = LecturerStatus::class;

    public string $actName = 'Lecturer Status';
    public string $actPath = 'master.reference.lecturer-status';
    public bool $create = true;

    public function delete($id): void {
        LecturerStatus::destroy($id);
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
            Column::callback('id', function ($id) {
                $model = LecturerStatus::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
