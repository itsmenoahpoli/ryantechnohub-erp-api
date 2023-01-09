<?php

namespace App\Services;

use Storage;

class FilesService
{
    public static function upload($file, $filepath, $filename, $isPublic = false)
    {
        Storage::disk('public')->putFileAs($filepath, $file, $filename);
    }

    public static function retrieve($file)
    {
        //
    }

    public static function destroy($file)
    {
        Storage::deleteFile($file);
    }

    public static function archive()
    {
        //
    }
}
