<?php

namespace Level7up\Dashboard\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Level7up\Dashboard\Models\Behaviors\Destroyable;
use Level7up\Dashboard\Models\Behaviors\Editable;
use Level7up\Dashboard\Models\Behaviors\HasDashboardAccess;
use Level7up\Dashboard\Models\Behaviors\Viewable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,HasDashboardAccess, SoftDeletes,
     Destroyable, Viewable, HasRoles;

    protected $base_route = "dashboard.users";
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'city',
        'government',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'=> 'date',
        'deleted_at' => 'datetime',
    ];
    public function getRoleNameAttribute()
    {
        return $this->role;
    }
    function getNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

}
