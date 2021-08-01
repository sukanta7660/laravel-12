<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    //

    public function media() :morphTo
    {
        return $this->morphTo();
    }

    public static function boot()
    {
        parent::boot();

        // $disk = Storage::disk('public');
        //        $path = $media->path.'/'.$media->name;
        //
        //        // Get File Size From Disc
        //        $size = $disk->getSize($path);
        //        // Get Mime Type From Disc
        //        $mime = $disk->mimeType($path);
        //        // Get file Extension to define its type
        //        $type = getFileType(File::extension($disk->path($path)));
        //        // Fill Data Before Store
        //
        //        $media->fill([
        //            'size' => $size,
        //            'type' => $type,
        //            'mime' => $mime,
        //        ]);
    }

}
