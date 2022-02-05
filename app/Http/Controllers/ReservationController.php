<?php


namespace App\Http\Controllers;
use App\Events\StatusNotification;
use App\Mail\Reservation;
use App\Mail\ReservationUser;
use App\Notifications\NewReservationNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\gameplayers;
use App\Models\games;
use App\Models\gamesadmin;
use App\Models\gamesadmins;
use App\Models\gamesplayers;
use App\Models\objects;
use App\Models\reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Facades\Datatables;
class ReservationController extends Controller{

    public function addreservations(){

        return view ('dashboards.users.addreservations');
       }
    function myreservations(){
        $id_user=Auth::id();
        $posts=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture')
        ->join('objects','objects.id','=','reservations.object_id')
        ->where('user_id',$id_user)
        ->orderBy('reservations.status','DESC')
        ->paginate(10);
        
        return view ('dashboards.users.myreservations',compact('posts'));
    }

    public function myreservationsdestroy($id){

        $myreservationsdestroy=reservations::find($id);
        $myreservationsdestroy->delete();
      
        Alert::success('Success','Poprawnie usunąłeś rezerwację');
       return redirect()->back();
        }

        public function myreservationsedit($id){
            $myreservationsedit=reservations::find($id);
            return view ('dashboards.users.myreservations',compact('myreservationsedit'));
            
    }
   public function myreservationsupdate(Request $request, $id){

    $object_id=reservations::select('object_id')->where('id',$id)->get();
    
    
    $validator=Validator::make($request->all(),[

       
        'title'=>'required',
        'start'=>'required',
        'end'=>'required',
        //'object_id'=>'required',
    ]);
    
    if($validator->fails()){
    
       
       return redirect()->with('error','Bład');
        
    }else{
        //$object_id=$request->get('object_id');
        $datastart=$request->get('start');
        $dataend=$request->get('end');

        $query=DB::select("select * from reservations WHERE (('$datastart' > start AND '$datastart' < end) or ('$dataend' > start AND  '$dataend' < end) OR ('$datastart' <= start AND '$dataend' >= end )) and reservations.object_id in(select objects.id from objects inner join reservations on reservations.object_id=objects.id  where reservations.id=$id);");
        
      $count=count($query);
    
        
        if($count > 0){

           
            return redirect()->with('error','Bład');
        }
        else{
        
        
            $post=reservations::find($id);
            $post->title = $request->get('title');
            $post->start = $request->get('start');
            $post->end = $request->get('end');
            
            $post->save();
            
    }
    }

    }


    function getReservationObject($id){

        $object=objects::find($id);
        
      
        return view('dashboards.users.reservationobject',['object'=>$object]);
    }
    
    public function storebook(Request $request,$id){
       
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
            
            
            event($postreserv= new reservations([
    
                'title' => $request->get('title'),
                'start' => $request->get('start'),
                'end' => $request->get('end'),
                'code' => uniqid(),
                'user_id' => Auth::id(),
                'object_id' => objects::where('id',$id)->first()->id,
            
               
               
            ]));
            $postreserv->save();
            $user=User::where('id','!=',auth()->user()->id)->get();
            $email_user=auth()->user()->email;
            event(new StatusNotification($postreserv));
            Notification::send($user, new NewReservationNotification($postreserv));
            Mail::to('admin@admin.admin')->send(new ReservationUser($postreserv,$object,$email_user));
            
            Alert::success('Success', 'Poprawnie dodałeś rezerwacje');
            return redirect()->back();
            //return view ('emails.emailUser',compact('postreserv'));
        }
        }
    }
    
    
     function reservationEvents($id){
        $object_id=objects::where('id',$id)->first()->id;
        
        $event=reservations::where('object_id',$object_id)->get();
        return response()->json($event);
    
    }


  
}