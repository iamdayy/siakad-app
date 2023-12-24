<?php

namespace App\Livewire\Datatables\Master\Users;

use App\Models\User;
use Arm092\LivewireDatatables\Column;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\NumberColumn;
use Illuminate\Database\Eloquent\Builder;

class Usertable extends LivewireDatatable
{
    public string|null|Model $model = User::class;

    public function builder(): Builder
    {
        return User::query();
    }
    public function getColumns(): array|Model
    {
        return [
            NumberColumn::name('id')
            ->label('ID'),
            Column::name('username')
            ->label('Username')
            ->searchable(),
            Column::name('email')
            ->label('Email'),
            Column::name('level.title')
            ->label('Level'),
            Column::callback('id', function ($id) {
                $model = User::find($id);
                return view('livewire.datatables.actions', ['model' => $model]);
            })->unsortable()
        ];
    }
}
