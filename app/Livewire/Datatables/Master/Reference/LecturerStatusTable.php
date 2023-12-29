<?php

namespace App\Livewire\Datatables\Master\Reference;

use App\Models\LecturerStatus;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class LecturerStatusTable extends DataTableComponent
{
    public $model = LecturerStatus::class;

    public string $actName = 'Lecturer Status';
    public string $actPath = 'master.reference.lecturer-status';
    public bool $create = true;

    public function delete($id): void {
        LecturerStatus::destroy($id);
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
                $model = LecturerStatus::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
