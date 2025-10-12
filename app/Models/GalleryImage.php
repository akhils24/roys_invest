<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category_id',
        'is_active',
        'priority'
    ];

    public function category()
    {
        return $this->belongsTo(CatGallery::class, 'category_id');
    }
}