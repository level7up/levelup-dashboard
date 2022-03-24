<?php
namespace Level7up\Dashboard\Models\Behaviors;


trait HasDashboardAccess
{
    public function getAvatarUrlAttribute($original)
    {
        if ($original) {
            return "/storage/avatars/".$original;
        }

        return asset('dashboard/media/avatars/blank.png');
    }
    public function getPetImageAttribute($original)
    {
        if ($original) {
            return "/storage/pet_image/".$original;
        }

        return asset('dashboard/media/avatars/blank.png');
    }

    public function getRoles(string $sp = "")
    {
        return $this->getRoleNames()->implode($sp);
    }
}