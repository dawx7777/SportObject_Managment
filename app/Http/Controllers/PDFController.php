<?php


namespace App\Http\Controllers;

use App\Models\objects;
use App\Models\reservations;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller{

    public function objectraports(){

        $objectraports=objects::all();
        return view ('dashboards.admins.raports',compact('objectraports'));
    }

 function generateAllpdf(Request $request,$id){

    $nameobject=objects::select('objects.name')
    ->where('objects.id',$id)
    ->get();
    $datastart=$request->get('date');
    $data=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
    ->join('objects','objects.id','=','reservations.object_id')
    ->join('users','users.id','=','reservations.user_id')
    ->where('objects.id',$id)
    ->where('start','>',''.$datastart.'')
    ->orderBy('reservations.status','DESC')
    ->get();
    $pdf=PDF::loadView('dashboards.admins.alldaypdf',$data,compact('data','nameobject'));
    
    return $pdf->download('raportogolny.pdf');
    
 }

 public function generateDaypdf($id){

    $nameobject=objects::select('objects.name')
    ->where('objects.id',$id)
    ->get();

    $data=reservations::select('reservations.id','reservations.end','reservations.start','reservations.title','reservations.status','objects.name','objects.picture','users.email')
    ->join('objects','objects.id','=','reservations.object_id')
    ->join('users','users.id','=','reservations.user_id')
    ->where('objects.id',$id)
    ->whereDate('start',date('Y-m-d'))
    ->orderBy('reservations.status','DESC')
    ->get();
    $pdf=PDF::loadView('dashboards.admins.daypdf',$data,compact('data','nameobject'));
    
    return $pdf->download('raportdzienny.pdf');


 }

}