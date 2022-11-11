<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
        
    protected $connection = 'mysql';
    protected $table = 'make';
    protected $guarded = [];
}
