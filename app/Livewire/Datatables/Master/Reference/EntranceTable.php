<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Entrance;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class EntranceTable extends LivewireDatatable
{
    public string|null|Model $model = Entrance::class;

    public function getColumns(): array|Model
    {
        return [
            Column::name('id')
            ->label('Id'),
            Column::name('code')
            ->label('Code'),
            Column::name('title')
            ->label('Title'),
        ];
    }
}
