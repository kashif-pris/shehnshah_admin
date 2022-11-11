<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'offerings';

    public function service_name(){
        return $this->belongsTo(Service::class,'serviceId');
    }
   
    public function bussness_offers()
    {
        return $this->hasOne(BusinessOffering::class, 'offeringId');
    }
    
}
