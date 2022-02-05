@extends('dashboards.users.layouts.user_dashboard-layout')
@section('title','Aplikacja Orlik')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="js/app.js"></script>
<div id="main" class="container">
  
                <div class="card">
                @foreach($teamgames as $teamgame)
            <h2 style="text-align: center; color:#3a3768">{{ $teamgame->first}}
                <span >{{ $teamgame->first_team_score }}</span>
                -
                <span>{{ $teamgame->second_team_score  }}</span>
                {{ $teamgame->second}}</h2>
            @auth
                    <div class="card-body" style="margin-left:300px;">
                        <form method="POST" action="{{route('updatePlayGame',$teamgame->id)}}">
                        @csrf 
                            <h5 style="text-align:center">Dodaj relacje</h5>
                            <input class="form-control" type="number" value="{{ $teamgame->first_team_score  }}" name="first_team_score" 
                                   placeholder="Liczba bramek 1 zespołu">
                            <input class="form-control" type="number" value="{{ $teamgame->second_team_score  }}" name="second_team_score" 
                                   placeholder="Liczba bramek 2 zespołu">
                            <input class="form-control" type="number" id="minute" name="minute" v-model="pendingUpdate.minute"
                                   placeholder="Minuta wydarzenie 0-90">
    
                            <input class="form-control" id="type" name="type" placeholder="Co się wydarzyło(gol,strzał, kontuzja, przerwa...)"
                                   v-model="pendingUpdate.type">
    
                            <input class="form-control" id="description" name="description" placeholder="Dodaj opis lub komentarz..."
                                   v-model="pendingUpdate.description">
    
                            <button type="submit" class="btn btn-primary" style="margin-left:100px;">Aktualizuj</button>
                        </form>
                       
                    </div>
                 
                </div>
            @endauth
            <br>
            <div class="card">
            <h4 style="text-align:center">Relacja meczowa</h4>
            @foreach($updates as $update)

            
            <div class="card-body"  style="font-size:10px; margin-top:-30px;">
                <div class="card-title">
                    <h6>{{ $update->minute }}' {{ $update->type }}</h5>
                </div>
                <div class="card-text" style="font-weight:bold">
                    {{ $update->description }}
                </div>
                <hr>
            </div>
            @endforeach
        </div>
        </div>
        @endforeach

@endsection
