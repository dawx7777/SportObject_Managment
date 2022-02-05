<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teamsadmins extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'user_id',
        'teams_id'
         

    ];
}