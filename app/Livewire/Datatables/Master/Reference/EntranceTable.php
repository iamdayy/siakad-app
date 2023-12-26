<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Entrance;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class EntranceTable extends LivewireDatatable
{
    public string|null|Model $model = Entrance::class;

    public string $actName = 'Entrance';
    public string $actPath = 'master.reference.entrance';
    public bool $create = true;

    public function delete($id): void {
        Entrance::destroy($id);
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
                $model = Entrance::find($id);
                return view('livewire.datatables.actions', ['model' => $model, 'path' => $this->actPath, 'actions' => ['edit', 'delete'] ]);
            })->unsortable()
        ];
    }
}
