<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objects extends Model
{
    protected $fillable = [
        'name',
        'adress',
        'city',
        'state',
        'hours',
        'latitude',
        'longitude'
        

    ];
}
