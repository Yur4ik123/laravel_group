<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Service extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['slug', 'category', 'price', 'duration_minutes', 'active'];
}
