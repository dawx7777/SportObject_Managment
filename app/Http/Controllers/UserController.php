<?php

namespace App\Http\Controllers;

use App\Events\StatusNotification;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\notifications;
use App\Models\objects;
use App\Models\reservations;
use App\Models\teamgames;
use App\Notifications\NewReservationNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;
use App\Notifications\BillingNotification;
use Illuminate\Bus\Queueable;

use RealRashid\SweetAlert\Facades\Alert;



class UserController extends Controller
{
    function index(){

        return view ('dashboards.users.index');
    }
  

    function createteam(){

        return view('dashboards.users.createteam');
    }
    function showteams(){

        return view('dashboards.users.createteam');
    }

    function profile(){

        return view ('dashboards.users.profile');
    }
  
    function messages(){
        //$users=User::where('id','!=',Auth::id())->get();
        $users=DB::select("select users.id,users.name,users.picture, users.email, count(is_read) as unread from users left join messages on users.id= messages.from and is_read=0 and messages.to=".Auth::id() ."
        where users.id != ". Auth::id() ."
        group by users.id, users.name, users.picture, users.email");
        return view ('dashboards.users.messages',['users' => $users]);
    }

    public function getMessage($user_id){
       $my_id=Auth::id();

       Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
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

        //pusher

        $options=array(
            'cluster' => 'eu',
                'useTLS' => true
        );

        $pusher=new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data= ['from' => $from, 'to' =>$to];
        $pusher->trigger('my-channel','my-event',$data);
    }

    function updateInfo(Request $request){
           
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            'adress'=>'required',
            'imie'=>'required',
            'nazwisko'=>'required',
            'phone'=>'required'

        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
                  'imie'=>$request->imie,
                  'nazwisko'=>$request->nazwisko,
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

public function objects(){


    $objects=objects::all();
    return view('dashboards.users.objects',["objects"=>$objects]);
    
}

public function getObject($id){

    $object=objects::find($id);
    return view('dashboards.users.object',['object'=>$object]);


}

public function ajax(){

    $filter=objects::all();
    $type=$filter->sortBy('type')->pluck('type')->unique();

    return view('dashboards.users.objects',compact('type'));
}

public function objectsindex(){


    $objects=objects::all();
    return view('dashboards.users.index',["objects"=>$objects]);
    
}

}
