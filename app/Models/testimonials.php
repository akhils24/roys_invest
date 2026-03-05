<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    protected $table = 'testimonials';
    protected $fillable = ['google_review_id','author_name','rating','text','profile_photo_url','source','google_relative_time','approved'];
}
