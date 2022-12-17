<?php

namespace Level7up\Dashboard\DataTables;

use Yajra\DataTables\Html\Button;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Services\DataTable as BaseDataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;
// use dataTable

abstract class DataTable extends BaseDataTable
{
    protected $model;
    protected $scrollX = false;

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('actions', 'dashboard::partials.dt.actions')
            ->addColumn('status_action', 'dashboard::partials.dt.status-action')
            ->rawColumns($this->getRawColumns());
    }

    public function html()
    {

        return $this->builder()
                    ->setTableId(uniqid('dt'))
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        $this->getButtons()
                    )
                    ->parameters([
                        'drawCallback' => 'function() { KTMenu.createInstances(); Livewire.rescan(); }',
                    ])
                    ->scrollX($this->scrollX);
    }
    protected function getButtons()
    {
        $create_route = request()->getPathInfo()."/create";

        return [
            // Button::make(['extend' => 'create', 'action' => "function() { window.location.replace('{$create_route}') }"]),
            Button::make('export'),
            Button::make('print'),
            Button::make('reload')
            ];
    }
    protected function getColumns()
    {
        $cols = [
            Column::make('actions')->exportable(false),
        ];

        if (in_array(SoftDeletes::class, class_uses_recursive($this->model))) {
            array_unshift($cols, Column::make('status_action')->title("Active"));
        }

        return $cols;
    }

    protected function getRawColumns($columns = [])
    {
        return array_merge(['status_action', 'actions'], $columns);
    }

    protected function filename()
    {
        return uniqid(config('app.name')) . date('-d-m-h');
    }
}