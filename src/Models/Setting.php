<?php

namespace Level7up\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Setting extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'locked' => 'boolean',
        'payload' => 'json',
    ];

    //----------- Scopes

    public function scopePalette(Builder $builder, $palette)
    {
        return $builder->where('palette', $palette);
    }
}
