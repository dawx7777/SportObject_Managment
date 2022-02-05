<?php


namespace App\Http\Controllers;

use App\Models\gameplayers;
use App\Models\games;
use App\Models\gamesadmin;
use App\Models\gamesadmins;
use App\Models\gamesplayers;
use App\Models\objects;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Facades\Datatables;
class SearchController extends Controller{

    public function indexsearch(Request $request){

        $objname= DB::table('objects')->select('name')->distinct()->get()->pluck('name');
        
        
         $staus=null;
        
        if($request->status=='Zatwierdzone'){
            $staus=1;
        }elseif($request->status=='Niezatwierdzone'){
            $staus=0;
        }
        if($request->filled('status')){
        $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
       ->join('objects','objects.id','=','reservations.object_id')
       ->join('users','users.id','=','reservations.user_id')
       ->where('reservations.status',$staus)
       ->get();
    
        }
        if($request->filled('name')){
       $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
       ->join('objects','objects.id','=','reservations.object_id')
       ->join('users','users.id','=','reservations.user_id')
       ->where('objects.name',$request->name)
       ->get();
        }
        if($request->filled('code')){
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','reservations.code','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('reservations.code',$request->code)
            ->get();
             }
        if($request->filled('date')){
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('reservations.created_at','>=',$request->date)
            ->get();
             }

        if($request->filled('name') && $request->filled('status')){
        
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('objects.name',$request->name)
            ->where('reservations.status',$staus)
            ->get();
        }
        if($request->filled('name') && $request->filled('date')){
        
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('objects.name',$request->name)
            ->where('reservations.created_at','>=',$request->date)
            ->get();
        }
        if($request->filled('status') && $request->filled('date')){
        
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('reservations.status',$staus)
            ->where('reservations.created_at','>=',$request->date)
            ->get();
        }
        if($request->filled('status') && $request->filled('date') &&  $request->filled('name')){
        
            $name=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->where('objects.name',$request->name)
            ->where('reservations.status',$staus)
            ->where('reservations.created_at','>=',$request->date)
            ->get();
        }
       

      // $name=$reservations->sortBy('objects.name')->pluck('objects.name')->unique();
       return view ('dashboards.admins.searchreser',compact('name'));

    }

    public function objectsearch(Request $request){
        if($request->filled('type')){
        $objsearch=objects::all()
        ->where('type',$request->type);
        }
        if($request->filled('count')){
            $objsearch=objects::all()
            ->where('count',$request->count);
        }
        if($request->filled('type') && $request->filled('count')){
            $objsearch=objects::all()
            ->where('type',$request->type)
            ->where('count',$request->count);

        }
    return view('dashboards.users.objectsearch',compact('objsearch'));

    }

}