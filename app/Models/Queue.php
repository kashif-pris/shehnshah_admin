<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'queues';
    
    public function business_name(){
        return $this->belongsTo(Business::class,'businessId');
    }
   static public function offerings($array){
        $BusinessOffering =  Offering::whereIn('id' ,$array)->select('id','title')->get();
        $offering =  Offering::whereNotIn('id' ,$array)->select('id','title')->get();
        $data = [$BusinessOffering,$offering];
        return $data;
    }
}
