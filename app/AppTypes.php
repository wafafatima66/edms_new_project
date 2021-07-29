<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppTypes extends Model
{
    protected $fillable = [
        'app_type_name', 
    ];
    protected $table = 'app_types';
}
