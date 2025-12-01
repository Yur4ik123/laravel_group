<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <- добавляем
use Astrotomic\Translatable\Translatable;

class Status extends Model
{
    use HasFactory; // <- добавляем
    use Translatable;

    public $translatedAttributes = ['name']; // переводимое поле
    protected $fillable = ['slug', 'active'];
}
