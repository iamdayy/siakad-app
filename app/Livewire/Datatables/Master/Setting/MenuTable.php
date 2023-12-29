<?php

namespace App\Livewire\Datatables\Master\Setting;

use App\Models\Menu;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class MenuTable extends DataTableComponent
{
    protected $model = Menu::class;

    public string $actPath = 'master.setting.menu';
    public string $actName = 'Menu';

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
            ImageColumn::make('Icon')
            ->location(
                fn($row) => storage_path('app/public/menu-icon/' . $row->icon . '.svg')
            ),
            Column::make('Title', 'title')
            ->searchable()
            ->sortable(),
            Column::make('Page', 'to'),
            Column::make('Level', 'level.title')
            ->sortable(),
            ComponentColumn::make('','id')->component('actions')->attributes(function ($value, $row, Column $column) {
                $model = Menu::find($value);
                return [ 'actions' => ['edit', 'delete'], 'model' => $model, 'path' => $this->actPath];
            }),
        ];
    }
}
