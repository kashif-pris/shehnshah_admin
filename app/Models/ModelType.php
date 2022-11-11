<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelType extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'model';
    protected $guarded = [];

    public function make_name(){
        return $this->belongsTo(Make::class,'make_id');
    }
}
