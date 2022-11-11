<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'cities';
    public function areas(){
        return $this->hasMany(Area::class,'city_id');
    }
    
}