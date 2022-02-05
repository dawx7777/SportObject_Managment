<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use App\Mail\ReservationAdminAccepted;
use App\Mail\ReservationAdminUnAccepted;
use App\Models\Message;
use App\Models\notifications;
use App\Models\objects;
use App\Models\reservations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;

class AdminController extends Controller
{
    function index(){

        return view ('dashboards.admins.index');
    }
    function listusers(){

        return view ('dashboards.admins.listusers'); 
    }
    function raports(){

        return view ('dashboards.admins.raports'); 
    }
   
    function settings(){

        return view ('dashboards.admins.settings');
    }
    function profile(){

        return view ('dashboards.admins.profile');
    }
   public function addreservations(){

    return view ('dashboards.admins.addreservations');
   }

    function objects(){

        $posts=objects::all();
        return view ('dashboards.admins.objects',compact('posts'));
    }

   public function allreservations(){

    $allres=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
    ->join('objects','objects.id','=','reservations.object_id')
    ->join('users','users.id','=','reservations.user_id')
    ->orderBy('reservations.created_at','DESC')
    ->paginate(10);
    

    return view ('dashboards.admins.allreservations',compact('allres'));
   }


   public function reservationsupdatestat(Request $request, $id){
   
    $resemail=reservations::select('users.email')
    ->join('users','users.id','=','reservations.user_id')
    ->where('reservations.id',$id)
    ->get();

    $reservationsupdatestat=reservations::find($id);
    
    DB::table('reservations')->where('id',$id)->update(['status'=> true]);
    Mail::to($resemail)->send(new ReservationAdminAccepted($reservationsupdatestat));
     Alert::success('Brawo','Poprawnie zmieniłeś status rezerwacji użytkownika');
       return redirect()->back();

   }

   public function reservationsdestroy($id){

    $reservationsdestroy=reservations::find($id);
    $resemail=reservations::select('users.email')
    ->join('users','users.id','=','reservations.user_id')
    ->where('reservations.id',$id)
    ->get();
    $reservationsdestroy->delete();
    Mail::to($resemail)->send(new ReservationAdminUnAccepted($reservationsdestroy));
    Alert::success('Success','Poprawnie usunąłeś rezerwację');
    return redirect()->back();
   }

    function createobject(Request $request){

        return view ('dashboards.admins.createobject');

    }

    function lightobject(Request $request){
       
	
                exec('gpio -g mode 17 out');
                exec('gpio -g write 17 1');
        
	
        return redirect()->back();


    }
    function lightobjectoff(Request $request){
             
        exec('gpio -g mode 17 out');
        exec('gpio -g write 17 0');


return redirect()->back();


}
    public function objectsdestroy($id){

    $obejctdestroy=objects::find($id);
    $obejctdestroy->delete();

    return redirect('admin/objects')->with('success', 'Pomyślnie usunełeś obiekt');
    }

    function objectshow($id){
        $obejctshow= objects::find($id);
        
    return view('dashboards.admins.objectshow',compact('obejctshow'));

    }

    function objectlight($id){
        $objectlight= objects::find($id);
        return view('dashboards.admins.objectlight',compact('objectlight'));

    }

    function objectsedit($id){
            $objectsedit=objects::find($id);
            return view('dashboards.admins.objectsedit',compact('objectsedit'));
    }
    function objectsupdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'adress' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'hours' => 'required|max:255',
            'latitude' => 'required|max:10',
            'longitude' => 'required|max:10',
            'width' => 'required|max:3',
            'lenght' => 'required|max:3',
            'count' => 'required',
            'type' => 'required',
            'light' => 'required'
            

        ]);

        $objectsedit=objects::find($id);
        $objectsedit->name = $request->get('name');
        $objectsedit->adress = $request->get('adress');
        $objectsedit->city = $request->get('city');
        $objectsedit->state = $request->get('state');
        $objectsedit->hours = $request->get('hours');
        $objectsedit->latitude = $request->get('latitude');
        $objectsedit->longitude = $request->get('longitude');
        $objectsedit->width = $request->get('width');
        $objectsedit->lenght = $request->get('lenght');
        $objectsedit->count = $request->get('count');
        $objectsedit->type = $request->get('type');
        $objectsedit->count = $request->get('count');
        $objectsedit->light = $request->get('light');
        if($request->hasFile('picture')){

            $file=$request->file('picture');
            $extension=$file->getClientOriginalExtension();
            $filename= time().'.'. $extension;
            $file->move('images/objects/',$filename);
            $objectsedit->picture=$filename;
            $objectsedit->save();

        };
           $objectsedit->save();

           Alert::success('Success', 'Pomyslnie zaktualiozowałeś obiekt');
        return redirect()->back();

    }

    function storeobject(Request $request){

        $request->validate([
            'name' => 'required',
            'adress' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'hours' => 'required|max:255',
            'latitude' => 'required|max:10',
            'longitude' => 'required|max:10',
            'width' => 'required|max:3',
            'lenght' => 'required|max:3',
            'count' => 'required',
            'type' => 'required',
            'light' => 'required',
            

        ]);

        $postobject= new objects([

            'name' => $request->get('name'),
            'adress' => $request->get('adress'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'hours' => $request->get('hours'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'width' => $request->get('width'),
            'lenght' => $request->get('lenght'),
            'count' => $request->get('count'),
            'type' => $request->get('type'),
            'light' => $request->get('light'),
            'picture' => $request->get('picture')
        ]);
        if($request->hasFile('picture')){

            $file=$request->file('picture');
            $extension=$file->getClientOriginalExtension();
            $filename= time().'.'. $extension;
            $file->move('images/objects/',$filename);
            $postobject->picture=$filename;
            $postobject->save();

        };
        $postobject->save();

        Alert::success('Success', 'Dodałeś obiekt');
        return redirect()->back();
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
                  'adress'=>$request->adress,
                  'imie'=>$request->imie,
                  'nazwisko'=>$request->nazwisko,
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

 public function messages(){
    //$users=User::where('id','!=',Auth::id())->get();
    $users=DB::select("select users.id,users.name,users.picture, users.email, count(is_read) as unread from users left join messages on users.id= messages.from and is_read=0 and messages.to=".Auth::id() ."
    where users.id != ". Auth::id() ."
    group by users.id, users.name, users.picture, users.email");
    return view ('dashboards.admins.messages',['users' => $users]);
}

public function getMessage($user_id){
   $my_id=Auth::id();

   Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
   $messages= Message::where(function($query) use ($user_id, $my_id){
       $query->where('from',$my_id)->where('to',$user_id);
   })->orWhere(function($query) use ($user_id, $my_id){
       $query->where('from',$user_id)->where('to',$my_id);
   })->get();
   return view ('dashboards.admins.message',['messages' => $messages]);
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

function getReservationObject($id){

    $object=objects::find($id);
  
    return view('dashboards.admins.reservations',['object'=>$object]);
}

public function storebookAdmin(Request $request,$id){
   
    $object=objects::find($id);
    
    $validator=Validator::make($request->all(),[

       
        'title'=>'required',
        'start'=>'required',
        'end'=>'required',
    ]);
    
    if($validator->fails()){
    
       Alert::error('Error','Nie podałeś danych lub podałeś błędne dane');
       return redirect()->back();
        
    }else{
        
        $datastart=$request->get('start');
        $dataend=$request->get('end');

        $query=DB::select("select * from reservations WHERE (('$datastart' > start AND '$datastart' < end) or ('$dataend' > start AND  '$dataend' < end) OR ('$datastart' <= start AND '$dataend' >= end ))AND object_id=$id ;");
        
      $count=count($query);
      
        
        if($count > 0){

            Alert::error('Error','Złe daty');
       return redirect()->back();
        }
        else{
        
        
        $postreserv= new reservations([

            'title' => $request->get('title'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'user_id' => Auth::id(),
            'status'=>'1',
            'object_id' => objects::where('id',$id)->first()->id,
        
           
           
        ]);
        $postreserv->save();
        Alert::success('Success', 'Dodałeś rezerwacje');
        return redirect()->back();
    }
    }
}
function reservationEventsAdmin($id){
    $object_id=objects::where('id',$id)->first()->id;
    
    $event=reservations::where('object_id',$object_id)->get();
    return response()->json($event);

}

public function markNotification(Request $request,$id){

notifications::find($id);
DB::table('notifications')->where('id',$id)->update(['read_at'=> date('Y-m-d H:i:s')]);
return redirect('admin/allreservations')->with('success', 'Wiadomość odczytana');

}

public function markAllNotification(Request $request){


    DB::table('notifications')->whereNull('read_at')->update(['read_at'=> date('Y-m-d H:i:s')]);
    return redirect('admin/allreservations')->with('success', 'Wiadomości odczytane odczytana');
    
    }


}
