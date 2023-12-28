<?php

namespace App\Livewire\Datatables\Master\Users;

use App\Models\Admin;
use App\Models\Collager;
use App\Models\Lecturer;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\WithData;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class Usertable extends DataTableComponent
{
    use WithData;

    protected bool $debugStatus = true;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return User::with('profileable')->select();
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Username', 'username')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email')
                ->searchable(),
            Column::make('Level', 'level.title')
                ->sortable(),
            Column::make('NIM/NIDN/Code')->label(function ($row, $column) {
                $profile = $row->profileable;
                $identifier = $profile->token | $profile->nim | $profile->nidn;
                return $identifier;
            })
                ->sortable()
                ->searchable(function (Builder $builder, $identifier) {
                    return $builder->orWhereHasMorph('profileable', Admin::class, function ($query) use ($identifier) {
                        return $query->where('token', 'like', '%' . $identifier . '%');
                    })->orWhereHasMorph('profileable', Staff::class, function ($query) use ($identifier) {
                        return $query->where('token', 'like', '%' . $identifier . '%');
                    })->orWhereHasMorph('profileable', Collager::class, function ($query) use ($identifier) {
                        return $query->where('nim', 'like', '%' . $identifier . '%');
                    })->orWhereHasMorph('profileable', Lecturer::class, function ($query) use ($identifier) {
                        return $query->where('nidn', 'like', '%' . $identifier . '%');
                    });
                }),
        ];
    }
}
