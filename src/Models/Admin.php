<?php

namespace Level7up\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Level7up\Dashboard\Models\Behaviors\HasDashboardAccess;
class Admin extends Authenticatable
{
    use HasFactory, HasDashboardAccess;

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
