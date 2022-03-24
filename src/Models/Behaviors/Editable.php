<?php

namespace Level7up\Dashboard\Models\Behaviors;

trait Editable
{
    public function getEditRouteAttribute()
    {
        return route("{$this->base_route}.edit", $this->id);
    }
}