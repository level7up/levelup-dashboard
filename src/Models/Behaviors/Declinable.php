<?php

namespace Level7up\Dashboard\Models\Behaviors;

trait Declinable
{
    public function getDeclineRouteAttribute()
    {
        return route("{$this->base_route}.decline", $this->id);
    }
}