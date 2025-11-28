<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Status extends Model
{
    use Translatable;

    public $translatedAttributes = ['name']; // переводимое поле
    protected $fillable = ['slug', 'active'];
}
