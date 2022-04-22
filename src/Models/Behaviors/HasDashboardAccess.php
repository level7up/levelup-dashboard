<?php
namespace Level7up\Dashboard\Models\Behaviors;


trait HasDashboardAccess
{
    public function getAvatarUrlAttribute($original)
    {
        if ($original) {
            return "/storage/avatars/".$original;
            dd($original);
        }

        return asset('dashboard/media/avatars/blank.png');
    }
    

    public function getRoles(string $sp = "")
    {
        return $this->getRoleNames()->implode($sp);
    }
}