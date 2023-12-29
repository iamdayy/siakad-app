<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Classroom;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
class ClassroomTable extends DataTableComponent
{
    public $model = Classroom::class;
    public string $actPath = 'master.reference.classroom';
    public string $actName = 'Classroom';
    public bool $create = true;

    public function delete($id): void
    {
        $classroom = Classroom::destroy($id);
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
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Code', 'code')
                ->searchable()
                ->sortable(),
            Column::make('Title', 'title')
                ->searchable()
                ->sortable(),
            Column::make('Capacity', 'capacity')
                ->sortable(),
            ComponentColumn::make('', 'id')->component('actions')->attributes(function ($value, $row, Column $column) {
                $model = Classroom::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
