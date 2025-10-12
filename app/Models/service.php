<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
     protected $table = "services";
    protected $fillable = ['name','icon', 'description','image','status','slug'];

    public function subServices()
    {
        return $this->hasMany(subservice::class, 'service_id');
    }
    
}

