<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Picture extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(100)->height(100);
    }

    public function  album(){
        $this->belongsTo(Album::class);
    }
}
