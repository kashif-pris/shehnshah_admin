<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Vehicle;

class Customer extends Model
{
    use HasFactory;

    public function Vehiclereleation()
    {
        return $this->belongsTo(Vehicle::class, 'selectedVehicle');
    }

    public function Businessreleation()
    {
        return $this->belongsTo(Business::class, 'ownerBusinessId');
    }
}
