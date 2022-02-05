<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class games extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'title',
        'description',
        'count_players',
        'ball',
        'markers',
        'status_game',
        'reservation_id'
         

    ];
}