<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gameplayers extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'name',
        'surname',
        'user_id',
        'games_id'
         

    ];
}