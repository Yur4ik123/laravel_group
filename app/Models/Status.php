<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <- добавляем
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory; // <- добавляем
    use Translatable;

    public $translatedAttributes = ['name']; // переводимое поле

    protected $fillable = ['slug', 'active'];
}
