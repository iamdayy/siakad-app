<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\Clas;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class ClassTable extends DataTableComponent
{
    public $model = Clas::class;

    public string $actName = 'Class';
    public string $actPath = 'master.reference.class';
    public bool $create = true;

    public function delete($id): void {
        Clas::destroy($id);
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
                $model = Clas::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
