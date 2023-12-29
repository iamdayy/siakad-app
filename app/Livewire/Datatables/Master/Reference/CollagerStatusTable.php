<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\CollagerStatus;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CollagerStatusTable extends DataTableComponent
{
    public $model = CollagerStatus::class;

    public string $actName = 'Collager Status';
    public string $actPath = 'master.reference.collager-status';
    public bool $create = true;

    public function delete($id): void {
        CollagerStatus::destroy($id);
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
                $model = CollagerStatus::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
