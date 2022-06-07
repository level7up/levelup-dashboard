<?php

namespace Level7up\Dashboard\DataTables;

use Level7up\Dashboard\Models\Admin;
use Level7up\Dashboard\DataTables\DataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;

class AdminsDataTable extends DataTable
{   
    protected $model = Admin::class;
    public function dataTable($query)
    {
        $dt = parent::dataTable($query->withTrashed());
        $rawCols = $this->getRawColumns();
        return $dt->rawColumns($rawCols);
    }


    public function query(Admin $model)
    {
        return $model->newQuery();
    }

    protected function getColumns()
    {
        return array_merge(
            [
                Column::make('id'),
                Column::make('name'),
                Column::make('email'),
            ],
            parent::getColumns()
        );
    }
}
