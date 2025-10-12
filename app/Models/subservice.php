<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subservice extends Model
{
    protected $table = "subservices";

    protected $fillable = ["service_id","name","image","description","content","slug","status"];

    public function service()
    {
        return $this->belongsTo(service::class, 'service_id');
    }
}
