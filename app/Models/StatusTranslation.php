<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTranslation extends Model
{
    public $timestamps = false; // если у переводов нет created_at/updated_at
    protected $fillable = ['name'];
}
