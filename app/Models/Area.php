<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'areas';
    protected $guarded = [];
    
    public function city_name(){
        return $this->belongsTo(City::class,'city_id');
    }
}
