<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        // ADD THIS
        'slug',
        'is_active',
        'display_order'
    ];

    public function images()
    {
        return $this->hasMany(GalleryImage::class, 'category_id')->orderBy('priority');
    }
}