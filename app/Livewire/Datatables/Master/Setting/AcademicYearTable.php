<?php

namespace App\Livewire\Datatables\Master\Setting;

use App\Models\AcademicYear;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class AcademicYearTable extends DataTableComponent
{
    public $model = AcademicYear::class;

    public string $actPath = 'master.setting.academic-year';
    public string $actName = 'Academic Year';

    public function delete($id): void
    {
        $classroom = AcademicYear::destroy($id);
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
            Column::make('Id', 'id'),
            Column::make('Code', 'code'),
            Column::make('Semester', 'semester')
            ->sortable(),
            BooleanColumn::make('status'),
            ComponentColumn::make('', 'id')->component('actions')->attributes(function ($value, $row, Column $column) {
                $model = AcademicYear::find($value);
                return ['actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
