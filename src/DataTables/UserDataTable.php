<?php

namespace Level7up\Dashboard\DataTables;

use App\Models\User;
use Level7up\Dashboard\DataTables\DataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;

class UserDataTable extends DataTable
{
    protected $model = User::class;
    public function dataTable($query)
    {
        $dt = parent::dataTable($query->withTrashed())
        ->addColumn('role', fn($r)=> $r->role_name);
        $rawCols = $this->getRawColumns();
        return $dt->rawColumns($rawCols);
    }


    public function query(User $model)
    {
        return $model->newQuery();
    }

    protected function getColumns()
    {
        return array_merge(
            [
                Column::make('id'),
                Column::make('first_name'),
                Column::make('last_name'),
                Column::make('user_name'),
                Column::make('role'),
                Column::make('email'),
            ],
            parent::getColumns()
        );
    }
}
