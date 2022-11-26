<?php

namespace Level7up\Dashboard\Vendor\Yajra\DataTables\Html;

use Yajra\DataTables\Html\Column as BaseColumn;

class Column extends BaseColumn
{

    public function datetime($format = 'd/ m/ Y H:i:s')
    {
        return $this->type('date')
            ->format($format);
    }
    
}
