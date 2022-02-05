<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teamgames extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'games_id',
        'firstteams_id',
        'secondteams_id',
        'first_team_score',
        'second_team_score',
        'status_gameteam'
        
    ];

}