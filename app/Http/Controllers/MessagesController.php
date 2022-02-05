<?php


namespace App\Http\Controllers;

use App\Models\gameplayers;
use App\Models\games;
use App\Models\gamesadmin;
use App\Models\gamesadmins;
use App\Models\gamesplayers;
use App\Models\reservations;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Facades\Datatables;
class MessagesController extends Controller{

    
    public function __construct()
    {
     
        $countunread=DB::select("select users.id,users.name,users.picture, users.email, count(is_read) as unread from users left join messages on users.id= messages.from and is_read=0 and messages.to=".Auth::id() ."
        where users.id != ". Auth::id() ."
        group by users.id, users.name, users.picture, users.email");
        view()->share('countunread',$countunread); 
    }
        
      
   

}