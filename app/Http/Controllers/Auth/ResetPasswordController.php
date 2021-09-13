<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
  
  

    use ResetsPasswords;

 
    
     
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){

        if(Auth()->user()->role ==1){
            return route('admin.dashboards');
        }elseif(Auth()->user()->role ==2 ){
            return route('user.dashboard');

        }
    }
}
