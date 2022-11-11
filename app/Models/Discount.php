<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'discounts';

    public function business_name(){
        return $this->belongsTo(Business::class,'businessId');
    }
    public function service_name(){
        return $this->belongsTo(Service::class,'serviceId');
    }

}
