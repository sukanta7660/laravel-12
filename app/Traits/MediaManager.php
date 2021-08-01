<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait MediaManager
{
    public function uploadFile($path, $file)
    {
        if(!$file instanceof UploadedFile){
            return false;
        }

        $extension = $file->extension();
        $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
        $imageName = $imageName.'.'.$extension;
        $path = public_path($path);
        $file->move($path,$imageName);
        $file->store($path,$imageName);
        return $imageName;
    }

    public function deleteFile($path, $fileName) :bool
    {
        if(Storage::disk('public')->exists($path.'/'.$fileName)){
            Storage::disk('public')->delete($path.'/'.$fileName);
            return true;
        }

        return false;
    }
}
