<?php

   namespace App\Helpers;

   use Intervention\Image\Facades\Image;

   class ImageHelper
   {
       public static function optimizeAndSave($file, $directory, $maxWidth = 1200)
       {
           $path = $file->store($directory, 'public');
           $fullPath = storage_path('app/public/' . $path);

           // Optimize image (resize if too large, maintain quality)
           $image = Image::make($fullPath);
           if ($image->width() > $maxWidth) {
               $image->resize($maxWidth, null, function ($constraint) {
                   $constraint->aspectRatio();
               });
           }
           $image->save($fullPath, 80); // 80% quality for JPEG

           return $path;
       }
   }