<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['images', 'category_id', 'slug', 'price'];

    /**
     * Get the category that owns the service.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
