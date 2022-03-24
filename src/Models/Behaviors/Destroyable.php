<?php

namespace Level7up\Dashboard\Models\Behaviors;

trait Destroyable
{
    public function getDeleteRouteAttribute()
    {
        // We soft delete by toggle component
        // if (method_exists($this, 'forceDelete') && !$this->trashed()) {
        //     return null;
        // }

        return route("{$this->base_route}.destroy", $this->id);
    }
}