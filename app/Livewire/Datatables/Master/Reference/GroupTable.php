<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class GroupTable extends LivewireDatatable
{
    public string|null|Model $model = Group::class;

    public string $actName = 'Group';
    public string $actPath = 'master.reference.group';
    public bool $create = true;

    public function delete($id): void {
        Group::destroy($id);
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
                $model = Group::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
