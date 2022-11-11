<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'services';
    
    public function business(){
        return $this->hasMany(Business::class,'id');
    }
}
