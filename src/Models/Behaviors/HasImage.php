<?php 
namespace Level7up\Dashboard\Models\Behaviors;

trait HasImage
{
    public function getImageUrlAttribute()
    {
        if($this->image){
            return asset('../storage/'.$this->image);
        }
        return asset('dashboard/media/avatars/blank.png');
    }
}