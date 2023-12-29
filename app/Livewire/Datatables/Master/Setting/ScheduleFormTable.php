<?php

namespace App\Livewire\Datatables\Master\Setting;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use App\Models\ScheduleForm;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class ScheduleFormTable extends DataTableComponent
{
    protected $model = ScheduleForm::class;

    public string $actPath = 'master.setting.schedule-form';
    public string $actName = 'Schedule Form';

    public function delete($id): void
    {
        $classroom = ScheduleForm::destroy($id);
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
            Column::make("Id", "id")
                ->sortable(),
                Column::make('Code', 'code')
                ->sortable()
                ->searchable(),
                Column::make('Title', 'title')
                ->sortable()
                ->searchable(),
                DateColumn::make('Start', 'start')
                ->sortable()
                ->outputFormat('d-m-Y'),
                DateColumn::make('End', 'end')
                ->sortable()
                ->outputFormat('d-m-Y'),
                BooleanColumn::make('Status', 'status'),
                ComponentColumn::make('', 'id')->component('actions')->attributes(function ($value, $row, Column $column) {
                    $model = ScheduleForm::find($value);
                    return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
                }),
        ];
    }
}
