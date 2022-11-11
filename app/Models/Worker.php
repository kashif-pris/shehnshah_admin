<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Service;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';

    public function Businessreleation()
    {
        return $this->belongsTo(Business::class, 'businessId');
    }
    public function service_name(){
        return $this->belongsTo(Service::class,'serviceId');
    }
}
