<?php

namespace App\Helper;

use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;



function uploadImage($file, $folder)
{

   $filename = time() . '.' . $file->getClientOriginalExtension();
   $url = $file->move(public_path('uploads/' . $folder), $filename);
   // return $url;
   return "uploads/$folder/" . $filename;
}

function deleteImage($image)
{

   if (File::exists($image)) {
      File::delete($image);
   }
}

function formatDate($dateString, $format = 'Y-m-d')
{
   $date = new DateTime($dateString);
   return $date->format($format);
}
