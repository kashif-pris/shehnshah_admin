<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessOffering extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'business_offerings';
    
    public function business(){
        return $this->belongsTo(Business::class,'businessId');
    }

    public function offering(){
        return $this->belongsTo(Offering::class,'offeringId');
    }

    public function service_name(){
        return $this->belongsTo(Service::class,'serviceId');
    }
   
    public function bussness_offers()
    {
        return $this->hasOne(BusinessOffering::class, 'offeringId');
    }

    
}
