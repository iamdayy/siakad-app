<?php

namespace App\Livewire\Datatables\Master\Users;

use App\Models\Level;
use Arm092\LivewireDatatables\Column;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;

class Leveltable extends LivewireDatatable
{
    public string|null|Model $model = Level::class;

    public function getColumns(): array|Model
    {
        return [
            Column::name('id')
            ->label('ID'),
            Column::name('title')
            ->label('Title')
            ->searchable(),
        ];
    }
}
