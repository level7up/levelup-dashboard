<?php 
namespace Level7up\Dashboard\Models\Behaviors;

trait HasImage
{
    public function getImageUrlAttribute()
    {
        if($this->image){
            return asset('../storage/'.$this->image);
        }
        return asset('assets/dashboard/media/avatars/blank.png');
    }
}