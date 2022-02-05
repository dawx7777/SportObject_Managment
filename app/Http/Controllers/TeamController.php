<?php


namespace App\Http\Controllers;

use App\Models\gameplayers;
use App\Models\games;
use App\Models\gamesadmin;
use App\Models\gamesadmins;
use App\Models\gamesplayers;
use App\Models\teamgames;
use App\Models\teams;
use App\Models\teamsadmin;
use App\Models\teamsadmins;
use App\Models\teamsusers;
use App\Models\UpdateGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Facades\Datatables;
class TeamController extends Controller{


    public function storeteam(Request $request){
        $validator=Validator::make($request->all(),[
            'teamname' => 'required',
            'start_date' => 'required',
            'place' => 'required',
            'logoteam' => 'required',
            'user_id'=>'unique:teamsadmins',
    
        ]);
        if($validator->fails()){
    
    Alert::error('Błąd', 'Nie podałeś wszystkich danych lub jesteś już członkiem innego zespołu');
    return redirect()->back();
        }
    
        $postteam= new teams;
    
            $postteam->teamname = $request->input('teamname');
            $postteam->start_date = $request->input('start_date');
            $postteam->place = $request->input('place');
            if($request->hasFile('logoteam')){

                $file=$request->file('logoteam');
                $extension=$file->getClientOriginalExtension();
                $filename= time().'.'. $extension;
                $file->move('images/teamlogo/',$filename);
                $postteam->logoteam=$filename;
                $postteam->save();

            };
        
           
        
        $postteam->save();
        $lastid=$postteam->id;
    $id_user=Auth::id();
    
    $postteamuser= new teamsadmins([
    
        'user_id' =>$id_user,
        'teams_id' =>$lastid,
    
    ]);
    $postteamuser->save();
    $postteamusers= new teamsusers([
    
        'user_id' =>$id_user,
        'teams_id' =>$lastid,
    
    ]);
    $postteamusers->save();
    Alert::success('Sukces', 'Poprawnie stworzyłes zespoł ');
    return redirect()->back();
    
    }
    public function allteams(){
    
        $allteams=teams::select('teams.id','teams.teamname','teams.start_date','teams.place','teams.logoteam','users.email')
        ->join('teamsadmins','teams.id','=','teamsadmins.teams_id')
        ->join('users','users.id','=','teamsadmins.user_id')
        ->orderBy('teams.id')
        ->get();
        
        return view ('dashboards.users.showteams',compact('allteams'));
    
    }


    public function teamdetail($id){

        $id=teams::where('id',$id)->first()->id;
       
        $team=DB::select("select teams.id,teams.teamname,teams.start_date,teams.place,teams.logoteam,users.email,count(teamsusers.id) as 'liczba',round(count(teamsusers.id)/12 * 100) as 'procent' from teams  left join teamsusers on teams.id=teamsusers.teams_id left join teamsadmins on teams.id=teamsadmins.teams_id left join users on users.id=teamsadmins.user_id where teams.id=$id group by teams.id,teams.teamname,teams.start_date,teams.place,teams.logoteam,users.email,'liczba','procent' ;");
        $teamusers=DB::select("select teamsusers.id,teams.teamname, users.name, users.email,users.picture,teamsusers.name,teamsusers.surname from teams inner join teamsusers on teams.id=teamsusers.teams_id left join users on users.id=teamsusers.user_id where teams.id=$id;");
        return view('dashboards.users.teamdetail')->with(array('team'=>$team ,'teamusers'=>$teamusers));
    
    }

    public function jointeam(Request $request,$id){

        $validator=Validator::make($request->all(),[
            
            'user_id'=>'required|unique:teamsusers,user_id',
    
        ]);
       

        $team=teams::where('id',$id)->first()->id;
        $user_id=Auth::id();
        $query=DB::select("select * FROM teamsusers WHERE user_id=$user_id and teams_id=$team;");
        $count=count($query);
        $query1=DB::select("select teams.id from teams INNER JOIN teamsusers on teams.id=teamsusers.teams_id where teams.id=$team GROUP BY teams.id HAVING count(teamsusers.id)=12;");
        $count1=count($query1);
        $query2=DB::select("select * FROM teamsusers WHERE user_id=$user_id");
        $count2=count($query2);
        
        
        if($count2 >= 1){

            Alert::error('Błąd', 'Jesteś już w innym zespole');
            return redirect()->back();
        }
        
        if($count > 0){
            Alert::error('Błąd', 'Już jesteś w tym zespole');
            return redirect()->back();
    
        }elseif($count1==1){
            Alert::error('Błąd', 'Zbyt duża liczba członków w zespole');
            return redirect()->back();
    
        }else{
        $jointeam=new teamsusers([
            'user_id' =>$user_id,
        'teams_id' =>$team,
        ]);
        $jointeam->save();
    Alert::success('Sukces', 'Dołączyłeś do zespołu. WITAJ');
    return redirect()->back();
        }
    }


    public function jointeamplayer(Request $request, $id){
        $team=teams::where('id',$id)->first()->id;
    
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            
    
        ]);
        $query1=DB::select("select teams.id from teams INNER JOIN teamsusers on teams.id=teamsusers.teams_id where teams.id=$team GROUP BY teams.id HAVING count(teamsusers.id)=12;");
        $count1=count($query1);
        if($count1==1){
            Alert::error('Błąd', 'Zbyt duża liczba członków w zespole');
            return redirect()->back();
    
        }else{
        $jointeamplayer=new teamsusers([
        'name'=>$request->get('name'),
        'surname'=>$request->get('surname'),
        'teams_id' =>$team,
        ]);
        $jointeamplayer->save();
    Alert::success('Sukces', 'Dodałeś gracza do zespołu');
    return redirect()->back();
    }
    }

    public function adminteamsdestroy($id){
        $adminteamdestroy=teams::find($id);
        $adminteamdestroy->delete();
      
        Alert::success('Sukces', 'Poprawnie usunąłeś zespół');
    return redirect()->back();

    }

    public function allAdminTeams(){
    
        $allteams=teams::select('teams.id','teams.teamname','teams.start_date','teams.place','teams.logoteam','users.email')
        ->join('teamsadmins','teams.id','=','teamsadmins.teams_id')
        ->join('users','users.id','=','teamsadmins.user_id')
        ->orderBy('teams.id')
        ->get();
        
        return view ('dashboards.admins.teams',compact('allteams'));
    
    }


public function invatieteam(Request $request, $id){
    $game=games::where('id',$id)->first()->id;
    $user_id=Auth::id();
    $team_first=teams::select('teams.id')
    ->join('teamsadmins','teams.id','=','teamsadmins.teams_id')
    ->join('users','users.id','=','teamsadmins.user_id')
    ->where('users.id',$user_id)->first()->id;
    
    $invaiteteam=new teamgames([
        'games_id'=>$game,
        'firstteams_id'=>$team_first,
        'secondteams_id' =>$request->get('teams_id')
        ]);
        $invaiteteam->save();
    Alert::success('Sukces', 'Zaprosiłeś zespoł do gry');
    return redirect()->back();
    

}

public function yoursteam(){
    $id=Auth::id();
    $allteams=teams::select('teams.id','teams.teamname','teams.start_date','teams.place','teams.logoteam','users.email')
    ->join('teamsusers','teams.id','=','teamsusers.teams_id')
    ->join('users','users.id','=','teamsusers.user_id')
    ->where('users.id',$id)
    ->orderBy('teams.id')
    ->get();
    
    return view ('dashboards.users.yoursteam',compact('allteams'));
}

public function yourteamdetail($id){

    $id=teams::where('id',$id)->first()->id;
   
    $team=DB::select("select teams.id,teams.teamname,teams.start_date,teams.place,teams.logoteam,users.email,count(teamsusers.id) as 'liczba',round(count(teamsusers.id)/12 * 100) as 'procent' from teams  left join teamsusers on teams.id=teamsusers.teams_id left join teamsadmins on teams.id=teamsadmins.teams_id left join users on users.id=teamsadmins.user_id where teams.id=$id group by teams.id,teams.teamname,teams.start_date,teams.place,teams.logoteam,users.email,'liczba','procent' ;");
    $teamusers=DB::select("select teams.id, teams.teamname, users.name, users.email,users.picture,teamsusers.name,teamsusers.surname from teams inner join teamsusers on teams.id=teamsusers.teams_id left join users on users.id=teamsusers.user_id where teams.id=$id;");
    $teamgames=DB::select("select teamgames.id,team1.teamname as first,team1.logoteam as firstlogo, team2.teamname as second,team2.logoteam as secondlogo,teamgames.status_gameteam from teamgames INNER join teams as team1 on teamgames.firstteams_id=team1.id INNER join teams as team2 on teamgames.secondteams_id=team2.id where teamgames.secondteams_id=$id or teamgames.firstteams_id=$id;");
    return view('dashboards.users.yourteamdetail')->with(array('team'=>$team ,'teamusers'=>$teamusers,'teamgames'=>$teamgames ));

}

public function gamesupdatestat(Request $request, $id){
    $gamesupdatestat=teamgames::find($id);
    
    DB::table('teamgames')->where('id',$id)->update(['status_gameteam'=> true]);
    Alert::success('Sukces','Poprawnie zmieniłeś status twojej gry');
    return redirect()->back();

   }

   public function teamgamesdestroy($id){

    $teamgamesdestroy=teamgames::find($id);
    $teamgamesdestroy->delete();
  
    Alert::success('Sukces','Poprawnie usunąłeś grę');
    return redirect()->back();
   }

   public function viewPlayGame($id){

    $ids=teamgames::find($id);
    $teamgames=DB::select("select teamgames.id,team1.teamname as first,team1.logoteam as firstlogo, team2.teamname as second,team2.logoteam as secondlogo,teamgames.status_gameteam,teamgames.first_team_score, teamgames.second_team_score from teamgames INNER join teams as team1 on teamgames.firstteams_id=team1.id INNER join teams as team2 on teamgames.secondteams_id=team2.id ");
    $updates=DB::select("select update_games.minute,update_games.type,update_games.description from update_games  where update_games.games_id=$id order by update_games.minute desc ");
    return view('dashboards.users.playgame', ['teamgames' => $teamgames, 'updates' => $updates]);
   }
public function updatePlayGame(Request $request, $id,Pusher $pusher){

    $playgame=new UpdateGame([
        'games_id'=>$id,
        'minute'=>$request->get('minute'),
        'type'=>$request->get('type'),
        'description'=>$request->get('description'),
        ]);
        $playgame->save();
        DB::table('teamgames')->where('id',$id)->update(['first_team_score'=> $request->get('first_team_score')]);
        DB::table('teamgames')->where('id',$id)->update(['second_team_score'=> $request->get('second_team_score')]);
        
    Alert::success('Sukces', 'Zaprosiłeś zespoł do gry');
    return redirect()->back();

}

public function updateScorePlayGame($id){
    $data=request()->all();
    teamgames::where('id',$id)->update($data);
    Alert::success('Sukces','Poprawnie usunąłeś grę');
    return redirect()->back();

}

public function disjointeam($id){
    $user_id=Auth::id();
    $disjointeam=teamsusers::select('teams_id',$id)->where('user_id',$user_id);
    $disjointeam->delete();
  
    Alert::success('Sukces','Poprawnie opuściłeś drużynę');
    return redirect()->back();
}

public function teamuserdestroy($id){

    $teamuserdestroy=teamsusers::find($id);
    $teamuserdestroy->delete();
  
    Alert::success('Sukces','Poprawnie usunąłeś gracza z zespołu');
    return redirect()->back();
}

function flashscore(){
    $flashscore=DB::select("select teamgames.id,team1.teamname as first,team1.logoteam as firstlogo, team2.teamname as second,team2.logoteam as secondlogo,teamgames.status_gameteam,teamgames.first_team_score, teamgames.second_team_score,reservations.start from teamgames INNER join teams as team1 on teamgames.firstteams_id=team1.id INNER join teams as team2 on teamgames.secondteams_id=team2.id inner join games on games.id=teamgames.games_id inner join reservations on reservations.id=games.reservation_id where status_game=1 ");
    return view('dashboards.users.flashscore',["flashscore"=>$flashscore]);
}

function flashscoreadmin(){
    $flashscore=DB::select("select teamgames.id,team1.teamname as first,team1.logoteam as firstlogo, team2.teamname as second,team2.logoteam as secondlogo,teamgames.status_gameteam,teamgames.first_team_score, teamgames.second_team_score,reservations.start from teamgames INNER join teams as team1 on teamgames.firstteams_id=team1.id INNER join teams as team2 on teamgames.secondteams_id=team2.id inner join games on games.id=teamgames.games_id inner join reservations on reservations.id=games.reservation_id where status_game=1 ");
    return view('dashboards.admins.flashscore',["flashscore"=>$flashscore]);
}

function flashscoreadminupdate($id, Request $request){

    $flashscoreadminupdate=teamgames::find($id);
    $flashscoreadminupdate->first_team_score = $request->get('firstteam');
    $flashscoreadminupdate->second_team_score = $request->get('secondteam');

    $flashscoreadminupdate->save();

    Alert::success('Sukces','Poprawnie zaktualizowałeś wynik');
    return redirect()->back();
}
}



