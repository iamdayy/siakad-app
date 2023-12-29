<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Entrance;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class EntranceTable extends DataTableComponent
{
    public $model = Entrance::class;

    public string $actName = 'Entrance';
    public string $actPath = 'master.reference.entrance';
    public bool $create = true;

    public function delete($id): void {
        Entrance::destroy($id);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([
            'before-tools' => [
                'components.buttons.create',
                ['actName' => $this->actName, 'actPath' => $this->actPath]
            ],
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Id','id')
            ->sortable(),
            Column::make('Code','code')
            ->searchable(),
            Column::make('Title','title')
            ->searchable(),
            ComponentColumn::make('', 'id')->component('actions')->attributes(function ($value, $row, Column $column) {
                $model = Entrance::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
