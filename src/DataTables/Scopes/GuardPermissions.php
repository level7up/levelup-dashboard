<?php

namespace Level7up\Dashboard\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class GuardPermissions implements DataTableScope
{
    private $guard;

    function __construct(string $guard)
    {
        $this->guard = $guard;
    }

    public function apply($query)
    {
        return $query->where('guard_name', $this->guard);
    }
}