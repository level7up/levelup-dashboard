<?php

namespace Level7up\Dashboard\Models\Behaviors;

trait Viewable
{
    public function getViewRouteAttribute()
    {
        return route("{$this->base_route}.show", $this->id);
    }
}