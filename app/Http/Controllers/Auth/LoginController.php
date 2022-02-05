<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    protected function redirectTo(){

        if(Auth()->user()->role==1){
            return route('admin.dashboard');
        }
        elseif(Auth()->user()->role==2){
            return route('user.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login (Request $request){

        $input=$request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if( Auth::attempt(array('email'=>$input['email'],'password'=>$input['password']))){

            if(auth()->user()->role==1){

                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role==2){

                return redirect()->route('user.dashboard');
            }
        }else{
            return redirect()->route('login')->with('error','Email i hasło są niepoprawne !!');
        }
    }
}
