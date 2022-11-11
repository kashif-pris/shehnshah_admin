<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessServices extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'business_services';
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class,'serviceId');
    }
    public function offerings(){
        return $this->belongsTo(Offering::class,'serviceId');
    }
    
}
