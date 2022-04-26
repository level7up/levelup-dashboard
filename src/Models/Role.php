<?php

namespace Level7up\Dashboard\Models;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    public function getColorAttribute()
    {
        return config(
            "dashboard.roles.colors.".strtolower($this->name),
            'light-primary'
        );
    }
}