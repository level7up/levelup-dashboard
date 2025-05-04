<?php

namespace Level7up\Dashboard\DataTables;

use App\Models\User;
use Level7up\Dashboard\DataTables\DataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;

class UserDataTable extends DataTable
{
    protected $model = User::class;
    protected $perPage = 15;
    public function dataTable($query)
    {
        $dt = parent::dataTable($query->withTrashed())
        ->addColumn('role', fn($r)=> $r->role_name)
        ->editColumn('created_at', function ($r) {
            return $r->created_at->format('Y-m-d H:i:s');
        });
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
                Column::make('email'),
                // Column::make('user_name'),
                Column::make('role'),
                Column::make('created_at'),
            ],
            parent::getColumns()
        );
    }
}
