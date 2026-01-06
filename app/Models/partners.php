<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partners extends Model
{
    protected $table = "partners";
    protected $fillable = ['name', 'logo', 'category','status'];
}
