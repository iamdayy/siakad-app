<?php

namespace App\Livewire\Datatables\Master\Setting;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class MenuTable extends DataTableComponent
{
    protected $model = Menu::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            ImageColumn::make('Icon')
            ->location(
                fn($row) => storage_path('app/public/menu-icon/' . $row->icon . '.svg')
            ),
        ];
    }
}
