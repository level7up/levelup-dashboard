<?php

namespace Level7up\Dashboard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Level7up\Dashboard\Models\Behaviors\Editable;
use Level7up\Dashboard\Models\Behaviors\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Level7up\Dashboard\Models\Behaviors\HasDashboardAccess;

class Admin extends Authenticatable
{
    use HasFactory, HasDashboardAccess, Editable, Viewable, SoftDeletes , HasRoles;

    protected $base_route = "dashboard.users";

    protected $guard_name = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
}
