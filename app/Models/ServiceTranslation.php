<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
