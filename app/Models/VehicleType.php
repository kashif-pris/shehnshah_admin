<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'vehicle_type';
    protected $guarded = [];
}
