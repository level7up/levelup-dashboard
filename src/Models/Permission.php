<?php

namespace Level7up\Dashboard\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use SoftDeletes;
}