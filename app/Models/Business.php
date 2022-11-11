<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'businesses';
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class,'serviceId');
    }
    public function provissioning(){
        return $this->hasMany(BusinessServices::class,'businessId')->with('service');
    }
    public function cityInfo(){
        return $this->belongsTo(City::class,'city');
    }
    public function areaInfo(){
        return $this->belongsTo(Area::class,'area');
    }
}
