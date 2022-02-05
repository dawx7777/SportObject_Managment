<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateGame extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'games_id',
        'minute',
        'type',
        'description',
      
         

    ];
   
}
