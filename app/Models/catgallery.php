<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catgallery extends Model
{
    protected $table = 'catgalleries';

    protected $fillable=['name','slug','status','display_order','description'];

    public function gallery()
    {
        return $this->hasMany(gallery::class, 'category_id');
    }
}
