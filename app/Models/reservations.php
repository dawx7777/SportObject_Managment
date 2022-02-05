<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    protected $fillable = [
        
        'title',
        'start',
        'end',
        'status',
        'code',
        'user_id',
        'object_id',
        'color' 

    ];
}