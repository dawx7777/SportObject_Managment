<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Yajra\Datatables\Facades\Datatables;
class ColumnSearchController extends Controller{

function index(Request $request){


    if($request->ajax())
    {
        if($request->name){

            $data=DB::table('reservations')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
            ->where('objects.name', $request->name);

        }
        else{

            $data=DB::table('reservations')
            ->join('objects','objects.id','=','reservations.object_id')
            ->join('users','users.id','=','reservations.user_id')
            ->select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email');
        }

        return DataTables::of($data)->make(true);
    }
    $name=DB::table('objects')
    ->select('*')
    ->get();
                

                return view('allreservations',compact('name'));
}

}
