<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index(){

        return view ('dashboards.users.index');
    }
    function settings(){

        return view ('dashboards.users.settings');
    }
    function profile(){

        return view ('dashboards.users.profile');
    }
    function messages(){
        $users=User::where('id','!=',Auth::id())->get();

        return view ('dashboards.users.messages',['users' => $users]);
    }

    public function getMessage($user_id){
       $my_id=Auth::id();
       $messages= Message::where(function($query) use ($user_id, $my_id){
           $query->where('from',$my_id)->where('to',$user_id);
       })->orWhere(function($query) use ($user_id, $my_id){
           $query->where('from',$user_id)->where('to',$my_id);
       })->get();
       return view ('dashboards.users.message',['messages' => $messages]);
    }

    public function postMessage(Request $request){

        $from=Auth::id();
        $to= $request->receiver_id;
        $message= $request->message;

        $data= new Message();
        $data->from=$from;
        $data->to=$to;
        $data->messages=$message;
        $data->is_read=0;
        $data->save();
    }

    function updateInfo(Request $request){
           
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            'adress'=>'required',
            'phone'=>'required'

        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
                  'adress'=>$request->adress,
                  'phone'=>$request->phone
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Coś poszło nie tak.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Twój profil został zaktualizowany.']);
             }
        }
}

function changePassword(Request $request){
    $validator=Validator::make($request->all(),[

        'oldpassword'=>[
            'required',function($attribute,$value,$fail){
                if( !Hash::check($value,Auth::user()->password)){
                    return $fail(__('Hasło jest nieprawidłowe'));
                }
            },
            'min:8',
            'max:30'
        ],
        'newpassword'=>'required|min:8|max:30',
        'cnewpassword'=>'required|same:newpassword'
    ],

[
    'oldpassword.required'=>"Wpisz obecne hasło",
    'oldpassword.min'=>"Stare hasło musi się składać z conajmniej 8 znaków",
    'oldpassword.max'=>"Stare hasło musi się składać z max 30 znaków",
    'newpassword.required'=>"Wpisz nowe hasło",
    'newpassword.min'=>"Nowe hasło musi się składać z conajmniej 8 znaków",
    'newpassword.max'=>"Nowe hasło musi się składać z max 30 znaków",
    'cnewpassword.required'=>"Powtórz nowe hasło",
    'cnewpassword.same'=>"Nowe hasła muszą sie zgadzać"
]);

    if($validator->fails()){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
    }else{

        $update= User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);

        if(!$update){
            return response()->json(['status'=>0,'msg'=>'Coś poszło nie tak. Błędna próba aktualizacji bazy danych']);
        }else{
            return response()->json(['status'=>1,'msg'=>'Hasło zostało zaktualizowane.']);
        }
    }
}
}
