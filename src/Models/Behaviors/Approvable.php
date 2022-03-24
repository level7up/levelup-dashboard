<?php

namespace Level7up\Dashboard\Models\Behaviors;

trait Approvable
{
    public function getApprovedRouteAttribute()
    {
        return route("{$this->base_route}.approve", $this->id);
    }
}