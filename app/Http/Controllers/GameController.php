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
class GameController extends Controller{

public function games(){

  

    $games=DB::select("select games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,objects.name,objects.adress,objects.city,count(gameplayers.id) as 'liczba' from games INNER join reservations on games.reservation_id=reservations.id inner join objects on objects.id=reservations.object_id left join gameplayers on games.id=gameplayers.games_id group by games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,objects.name,objects.adress,objects.city,'liczba' ;");
    

    return view ('dashboards.users.games',compact('games'));

}
public function allgames(){
    
    $allgames=games::select('games.id','games.title','games.description','games.count_players','games.ball','games.markers','objects.name','reservations.start','reservations.end')
    ->join('reservations','reservations.id','=','games.reservation_id')
    ->join('objects','objects.id','=','reservations.object_id')
    ->orderBy('games.id')
    ->get();
    
    return view ('dashboards.admins.games',compact('allgames'));

}


public function getGame($id){

    $id=games::where('id',$id)->first()->id;
    $id_user=Auth::id();
    $game=DB::select("select games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,reservations.end,objects.name,objects.adress,objects.city,objects.latitude,objects.longitude,users.email,count(gameplayers.id) as 'liczba',round(count(gameplayers.id)/games.count_players * 100) as 'procent' from games INNER join reservations on games.reservation_id=reservations.id inner join objects on objects.id=reservations.object_id left join gameplayers on games.id=gameplayers.games_id left join gamesadmins on games.id=gamesadmins.games_id left join users on users.id=gamesadmins.user_id where games.id=$id group by games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,reservations.end,objects.name,objects.adress,objects.latitude,objects.longitude,users.email,objects.city,'liczba','procent' ;");
    $teammod=DB::select("select teams.id,teams.teamname from teams INNER join teamsadmins on teamsadmins.teams_id=teams.id INNER join users on teamsadmins.user_id=users.id where users.id not like $id_user;");
    $gameuser=DB::select("select games.id,games.title, users.name, users.email,users.picture,gameplayers.name,gameplayers.surname from games inner join gameplayers on games.id=gameplayers.games_id left join users on users.id=gameplayers.user_id where games.id=$id;");
    $teamgames=DB::select("select teamgames.id,team1.teamname as first,team1.logoteam as firstlogo, team2.teamname as second,team2.logoteam as secondlogo,teamgames.status_gameteam from teamgames INNER join teams as team1 on teamgames.firstteams_id=team1.id INNER join teams as team2 on teamgames.secondteams_id=team2.id where teamgames.games_id=$id;");
    return view('dashboards.users.game')->with(array('game'=>$game ,'gameuser'=>$gameuser,'teammod'=>$teammod,'teamgames'=>$teamgames));

}

public function creategame(){
    $id_user=Auth::id();
    $reserv=DB::select("select reservations.id,reservations.title,reservations.start,reservations.end from reservations
     left join games on games.reservation_id=reservations.id where reservations.user_id=$id_user 
    and reservations.status=true and games.reservation_id is null;");
    return view ('dashboards.users.makegame',compact('reserv'));

}
public function storegame(Request $request){
    $validator=Validator::make($request->all(),[
        'title' => 'required',
        'description' => 'required|max:1255',
        'count_players' => 'required',
        'reservation_id' => 'required',
        

    ]);
    if($validator->fails()){

Alert::error('error', 'Nie podałeś wszystkich danych, lub nie posiadasz zarezerwowanego obiektu');
return redirect()->back();
    }

    $postgame= new games([

        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'count_players' => $request->get('count_players'),
        'ball' => $request->get('ball'),
        'markers' => $request->get('markers'),
        'status_game'=>'1',
        'reservation_id' => $request->get('reservation_id'),
       
    ]);
    $postgame->save();
    $lastid=$postgame->id;
$id_user=Auth::id();

$postgameuser= new gamesadmins([

    'user_id' =>$id_user,
    'games_id' =>$lastid,

]);
$postgameuser->save();

Alert::success('success', 'Dodałeś poprawnie grę ');
return redirect()->back();

}

public function joingame($id){

    $game=games::where('id',$id)->first()->id;
    $user_id=Auth::id();
    $query=DB::select("select * FROM gameplayers WHERE user_id=$user_id and games_id=$game;");
    $count=count($query);
    $query1=DB::select("select games.id, games.count_players from games INNER JOIN gameplayers on games.id=gameplayers.games_id where games.id=$game GROUP BY games.id,games.count_players HAVING count(gameplayers.id)=games.count_players;");
    $count1=count($query1);
    
    
    if($count > 0){
        Alert::error('error', 'Już dołączyłeś do gry');
        return redirect()->back();

    }elseif($count1==1){
        Alert::error('error', 'Zbyt duża liczba graczy');
        return redirect()->back();

    }else{
    $joingame=new gameplayers([
        'user_id' =>$user_id,
    'games_id' =>$game,
    ]);
    $joingame->save();
Alert::success('success', 'Dołączyłeś do gry. WITAJ');
return redirect()->back();
    }
}


public function joingameplayer(Request $request, $id){
    $game=games::where('id',$id)->first()->id;

    $request->validate([
        'name' => 'required',
        'surname' => 'required',
        

    ]);
    $query1=DB::select("select games.id, games.count_players from games INNER JOIN gameplayers on games.id=gameplayers.games_id where games.id=$game GROUP BY games.id,games.count_players HAVING count(gameplayers.id)=games.count_players;");
    $count1=count($query1);
    if($count1==1){
        Alert::error('error', 'Zbyt duża liczba graczy');
        return redirect()->back();

    }else{
    $joingameplayer=new gameplayers([
    'name'=>$request->get('name'),
    'surname'=>$request->get('surname'),
    'games_id' =>$game,
    ]);
    $joingameplayer->save();
Alert::success('success', 'Dodałeś gracza do gry');
return redirect()->back();
}
}

public function showyourgame(){

    $id_user=Auth::id();
    $posts=games::select('gameplayers.id','games.title','games.description','games.count_players','games.ball','games.markers','objects.name','reservations.start')
    ->join('reservations','reservations.id','=','games.reservation_id')
    ->join('objects','objects.id','=','reservations.object_id')
    ->join('gameplayers','games.id','=','gameplayers.games_id')
    ->where('gameplayers.user_id',$id_user)
    ->orderBy('gameplayers.id')
    ->get();
    
    return view ('dashboards.users.showyourgame',compact('posts'));
}

public function showyourgamedestroy($id){

    $showyourgamedestroy=gameplayers::find($id);
    $showyourgamedestroy->delete();
  
    Alert::success('success', 'Poprawnie usunąłeś się z gry');
return redirect()->back();
    }


    public function admingamesdestroy($id){
        $admingamedestroy=games::find($id);
        $admingamedestroy->delete();
      
        Alert::success('success', 'Poprawnie usunąłeś grę');
    return redirect()->back();

    }


    public function admingameshow($id){

        $id=games::where('id',$id)->first()->id;
   
        $game=DB::select("select games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,reservations.end,objects.name,objects.adress,objects.city,objects.latitude,objects.longitude,users.email,count(gameplayers.id) as 'liczba',round(count(gameplayers.id)/games.count_players * 100) as 'procent' from games INNER join reservations on games.reservation_id=reservations.id inner join objects on objects.id=reservations.object_id left join gameplayers on games.id=gameplayers.games_id left join gamesadmins on games.id=gamesadmins.games_id left join users on users.id=gamesadmins.user_id where games.id=$id group by games.id,games.title,games.description,games.count_players,games.ball, games.markers,reservations.start,reservations.end,objects.name,objects.adress,objects.latitude,objects.longitude,users.email,objects.city,'liczba','procent' ;");
        $gameuser=DB::select("select games.id,games.title, users.name, users.email,users.picture,gameplayers.name,gameplayers.surname from games inner join gameplayers on games.id=gameplayers.games_id left join users on users.id=gameplayers.user_id where games.id=$id;");
        return view('dashboards.admins.gameshow')->with(array('game'=>$game ,'gameuser'=>$gameuser));
    }
}
