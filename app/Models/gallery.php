<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['title', 'slug', 'category_id', 'description', 'image', 'status', 'priority'];

    public function catgallery()
    {
        return $this->belongsTo(catgallery::class, 'category_id');
    }
}
