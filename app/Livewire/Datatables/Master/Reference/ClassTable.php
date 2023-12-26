<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Clas;
use Arm092\LivewireDatatables\Column;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;

class ClassTable extends LivewireDatatable
{
    public string|null|Model $model = Clas::class;

    public string $actName = 'Class';
    public string $actPath = 'master.reference.class';
    public bool $create = true;

    public function delete($id): void {
        Clas::destroy($id);
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
                $model = Clas::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
