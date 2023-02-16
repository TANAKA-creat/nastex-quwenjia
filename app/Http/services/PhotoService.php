<?php 

namespace App\Http\Services;

use App\Models\Photo;

class PhotoService
{
  public static function getPhoto()
  {
    return Photo::all();
  }
}