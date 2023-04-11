<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model
{

    use HasFactory;
//    use InteractsWithMedia;
    protected $guarded = [];


   public function  pictures(){
       $this->hasMany(Picture::class);
   }
}
