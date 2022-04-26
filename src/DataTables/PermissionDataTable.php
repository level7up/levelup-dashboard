<?php

namespace Level7up\Dashboard\DataTables;

use Level7up\Dashboard\Models\Permission;
use Level7up\Dashboard\DataTables\DataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;


class PermissionDataTable extends DataTable
{
    protected $model = Permission::class;

    public function query(Permission $model)
    {
        // dd($model);
        return $model->newQuery()
            ->withTrashed()
            ->orderBy('group')
            ->orderBy('name');
    }

    public function dataTable($query)
    {
        $dt = parent::dataTable($query)
            ->editColumn('name', '{{ucwords(str_replace("-"," ", $name))}}')
            ->editColumn('group', '{{Str::title($group)}}')
            ->addColumn('assigned_to', 'dashboard::pages.permissions.dt.assigned_to');

        return $dt->rawColumns(['assigned_to', 'status_action']);

    }

    public function html()
    {
        return $this->builder()
                    ->setTableId(uniqid('dt'))
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->parameters([
                        'drawCallback' => 'function() { KTMenu.createInstances(); Livewire.rescan(); }',
                    ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('assigned_to')
                ->title("Assigned to"),
            Column::make('status_action')
                ->title("Status"),
            Column::make('group'),
        ];
    }
}
