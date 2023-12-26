<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\CollagerStatus;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;

class CollagerStatusTable extends LivewireDatatable
{
    public string|null|Model $model = CollagerStatus::class;

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
