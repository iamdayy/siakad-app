<?php

namespace App\Livewire\Datatables\Master\Users;

use App\Models\Level;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

class Leveltable extends DataTableComponent
{
    public $model = Level::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function columns(): array
    {
        return [
            Column::make('Id' ,'id')
            ->sortable(),
            Column::make('Title', 'title')
            ->sortable()
            ->searchable(),
        ];
    }
}
