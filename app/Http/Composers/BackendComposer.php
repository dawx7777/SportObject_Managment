<?php
namespace App\Http\Composers;

use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BackendComposer{


    public function compose(){


        return view('dashboards.admins.profile',notifications::where('user_id',Auth::user()->id)->get());
    }
}