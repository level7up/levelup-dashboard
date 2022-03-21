<<<<<<< HEAD
<?php

namespace Level7up\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use HasFactory;

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
=======
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
>>>>>>> 33d6f31f975fcc4b26055cda5adde90a09f46d5b
