<?php 

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService
{
    public static function Upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand() . '_');
        $extention = $imageFile->extension(); //拡張子の取得
        $fileNameToStore = $fileName . '.' . $extention;
        $resizedImage = InterventionImage::make($imageFile)
                        ->resize(1920, 1080)
                        ->encode();

        Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);
        return $fileNameToStore;
    }
}