<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\CollagerStatus;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class CollagerStatusTable extends LivewireDatatable
{
    public string|null|Model $model = CollagerStatus::class;

    public string $actName = 'Collager Status';
    public string $actPath = 'master.reference.collager-status';
    public bool $create = true;

    public function delete($id): void {
        CollagerStatus::destroy($id);
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
                $model = CollagerStatus::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
