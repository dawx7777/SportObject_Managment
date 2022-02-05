<?php


namespace App\Http\Controllers;

use App\Models\gameplayers;
use App\Models\games;
use App\Models\gamesadmin;
use App\Models\gamesadmins;
use App\Models\gamesplayers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Facades\Datatables;
class StatisticController extends Controller{

    public function reservationsAllCount(){

        $reservationsallcount=DB::select("select count(*) as 'liczba' from reservations;");
        $reservationsallcountday=DB::select("select count(*) as 'liczba' from reservations where date(start)=CURRENT_DATE;");
        $gamesallcount=DB::select("select count(*) as 'liczba' from games;");
        $usersallcount=DB::select("select count(*) as 'liczba' from users;");
        $objectsallcount=DB::select("select count(*) as 'liczba' from objects;");



        return view ('dashboards.admins.index',compact('reservationsallcount','reservationsallcountday','gamesallcount','usersallcount','objectsallcount'));

    }

}