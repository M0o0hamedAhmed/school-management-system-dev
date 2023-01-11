<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    public $translatable = ['Name'];
    protected $guarded =[];
    protected $table = 'Grades';
    public $timestamps = true;

}
