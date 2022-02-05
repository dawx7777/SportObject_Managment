<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'teamname',
        'start_date',
        'place',
        'logoteam',
      
         

    ];
}