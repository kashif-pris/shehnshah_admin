<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Service;
use App\Models\Offering;
use App\Models\Customer;

class Booking extends Model
{
    use HasFactory;



    public function businessreleation()
    {
        return $this->belongsTo(Business::class, 'businessId');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceId');
    }

    public function offer()
    {
        return $this->belongsTo(Offering::class, 'offeringId');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }


}

