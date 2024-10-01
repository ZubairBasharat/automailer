<?php

namespace App\Library;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public static function uploadProfileImage(UploadedFile $fileToUpload, $subDirectory = null, $existingFile = null)
    {
        $fileName = self::generateFileName($fileToUpload);

        self::oldFileCleanUp($existingFile);
        self::saveImage($fileToUpload, $fileName, $subDirectory);

        return $fileName;
    }


    private static function saveImage(UploadedFile $imageToUpload, $fileName = null, $subDirectory = null)
    {
        Storage::disk('public')->putFileAs(
            $subDirectory ? $subDirectory : '',
            $imageToUpload,
            $fileName,
        );


        return $fileName;
    }

    public static function oldFileCleanUp($existingFile)
    {
        if ($existingFile) {
            /**
             * If the old image exists
             * @var boolean $exists
             */
            $exists = Storage::disk('public')->exists($existingFile);

            if ($exists) {
                return Storage::disk('public')->delete($existingFile);
            }

            return false;
        }
    }

    private static function generateFileName(UploadedFile $file)
    {
        return time() . '-' . $file->getClientOriginalName();
    }
}
