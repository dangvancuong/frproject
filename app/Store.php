<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'address',
        'logo',
        'phone',
        'status',
        'open_time',
        'close_time'
    ];
}
