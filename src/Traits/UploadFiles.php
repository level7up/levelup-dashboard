<?php 
namespace Level7up\Dashboard\Traits;

trait UploadFiles {
    /**
     * Upload image
     *
     * @return string
     */
    
     public function uploadImageAndReturnName($request, $file,  $path, $defImg='null') :string
    {
        if ($request->hasFile($file)) {
            $image = $request->file($file);
            $extension=$image->extension();
            $imageName = $path.'/'.rand(0, 9999999).'.'.$extension;
            $image->move(public_path('storage/'.$path), $imageName);
        } else {
            $imageName = $defImg;
        }
        return $imageName;
    }


}