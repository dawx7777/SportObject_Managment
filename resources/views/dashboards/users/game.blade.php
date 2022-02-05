
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    
    <title>@yield('title')</title>
    <base href="{{\URL::to('/') }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script  src="{{ asset('js/lang.js') }}"></script>
</head>

<body>

     
      
    
    <div class="wrapper">

    
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ORLIKOWA</h3>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
 
<img src="{{Auth::user()-> picture}}" alt="Avatar" class="avatar">
        <div class="info">
          <a href="{{route('user.profile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <hr id="hr">
            <ul class="list-unstyled components">
                
                <li>
                <a href="{{route('user.dashboard')}}"><i class="fa fa-home fa-2x"></i>Strona Główna</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-group fa-2x"></i>Zespoły</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('user.createteam')}}"><i class="	fa fa-plus fa-1x"></i>Stwórz zespół</a>
                        </li>
                        <li>
                            <a href="{{route('user.showteams')}}"><i class="fa fa-eye fa-1x"></i>Wyświetl zespoły</a>
                        </li>
                        <li>
                            <a href="{{route('user.yoursteam')}}"><i class="fa fa-eye fa-1x"></i>Twój zespół</a>
                        </li>
                        <li>
                            <a href="{{route('user.flashscore')}}"><i class="fa fa-globe fa-1x"></i>Wyniki spotkań</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-futbol-o fa-2x"></i>Gry</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('user.games')}}"><i class="fa fa-eye fa-1x"></i>Wyświetl Gry</a>
                        </li>
                        <li>
                            <a href="{{route('user.makegame')}}"><i class="fa fa-plus fa-1x"></i>Stwórz gre</a>
                        </li>
                        <li>
                            <a href="{{route('user.showyourgame')}}"><i class="fa fa-floppy-o fa-1x"></i>Zapisane gry</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="{{route('user.profile')}}"><i class="fa fa-user fa-2x"></i>Profile</a>
                </li>
                <li>
                    <a href="{{route('user.addreservations')}}"><i class="fa fa-calendar-plus-o  fa-2x"></i>Dodaj Rezerwacje</a>
                </li>
                <li>
                    <a href="{{route('user.myreservations')}}"><i class="fa fa-calendar-check-o  fa-2x"></i>Moje Rezerwacje</a>
                </li>
                <li>
                    <a href="{{route('user.messages')}}"><i class="fa fa-commenting fa-2x"></i>Wiadomości</a>
                </li>
                <li>
                    <a href="{{route('user.objects')}}"><i class="fa fa-map-marker fa-2x"></i>Obiekty</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a class="wyloguj" href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                  
                </li>
                
            </ul>
        </nav>
        

       
        <div id="content">
        
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fa fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    

                    
                </div>
                
            </nav> 
            @foreach($game as $gam)
            <div class="card" >
            @include('sweetalert::alert')
<div class="row">
        <div class="col-md-15 " >
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="POST" action="{{route('joingame',$gam->id)}}">
            @csrf
            <h5> Dołącz do gry
          <button type="submit" class="btn btn-success">
              <i class="fa fa-plus" ></i>
          </button></h5>
          </form>

         
          @if(Auth::user()->email == $gam->email)
          <h5>Dodaj graczy do gry 
          <button class="btn" id="addEventButton" >ADD player</button></h5> 
          @endif
          <h5>Zaproś zespoł do gry 
          <button class="btn" id="addEventButton1" style="width: auto;">Zaproś zespół</button> </h5>
                                <div class="m-b-md">
                            
                                    <h2>{{$gam->title}}</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Miejsce:</dt> <dd><span class="label label-primary">{{$gam->name}}</span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">

                                    <dt>Organizator:</dt> <dd>{{$gam->email}}</dd>
                                    <dt>Lokalizacja:</dt> <dd>{{$gam->adress}}, {{$gam->city}}</dd>
                                    <dt>Opis:</dt> <dd> {{$gam->description}}</a> </dd>
                                    <dt>Sprzęt:</dt> <dd>
                                    @if ($gam->ball == 0)
    Brak piłki
@else 
<li><i class="fa fa-futbol-o" aria-hidden="true"></i>
@endif
 @if ($gam->markers == 0)
    Brak odznaczników
@else 
<i class="fa fa-user" aria-hidden="true"></i></li>
@endif

                                    </dd>
                                    @foreach($teamgames as $teamgame)
                                    @if ($teamgame->status_gameteam == 1)
                                    <dt>Spotkanie:</dt> <dd> {{$teamgame->first}} vs {{$teamgame->second}} </a> <a href="{{route('user.playgame', $teamgame->id)}}" class="text" style="color:green">Przejdź aby śledzić<i class="fa fa-arrow-right"></i></a></dd>
                                    
                                    @endif
                                    @endforeach
                                </dl>
                            </div>
                            <div class="col-lg-6" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>Data rozpoczęcia:</dt> <dd>{{$gam->start}}</dd>
                                    <dt>Data zakończenia:</dt> <dd> {{$gam->end}}</dd>
                                    
                            </div>
                            
                                 
                            <div id="map" style="display:block;"> 

                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Liczba uczestników:</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="width:<?php echo $gam->procent ?>%; background-color:#3a3768; " class="progress-bar"></div>
                                        </div>
                                        <small>Zespół pełny w <strong>{{$gam->procent}}% </strong> Aby rozpocząć grę potrzebujemy 100%</small>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div id="dialog_book">
    <div id="dialog_body">
        <form id="dayClick" method="POST" action="{{route('joingameplayer',$gam->id)}}">
        @csrf
        <div class="form-group">
            <label>Imie</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Podaj Imię gracza">
        </div>
        <div class="form-group">
            <label>Nazwisko</label>
            <input type="text" id="surname" class="form-control" name="surname" placeholder="Podaj Nazwisko gracza">
        </div>
       
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Dodaj</button>
           
        </div>

        </form>
    </div>


    
</div>
<div id="dialog_book1">
<div id="dialog_body">
        <form id="dayClick1" method="POST" action="{{route('invatieteam',$gam->id)}}">
        @csrf
        <div class="form-group">
            <label>Wybierz zespół</label>
            <select class="form-control" id="object-light" name="teams_id" >
@foreach($teammod as $mode)
 <option  value="{{$mode->id}}" name="{{$mode->id}}" id="{{$mode->id}}" >{{$mode->teamname}} </option>
   
   @endforeach
 
 </select>
        </div>
       
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Dodaj</button>
           
        </div>

        </form>
</div>
</div>
<style>
    #dialog_book{

       display: none; 
    }
    #dialog_book1{

display: none; 
}
    div#map{

        
display: block;
height: 500px;
width: 100%;
border: 3px solid #3a3768;
margin-left: 300px;

}
    </style>
 <script src="{{ asset('js/googlemap.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs7B7wjMPnxIIr_-1J7D8FblL4x6IdUXY&callback=initMap" async="false"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script>




function initMap() {
    var mapElement = document.getElementById('map');
    var url='/api/map-marker';

    async function markerscodes(){
    var data=await axios(url);
    var lacationData=data.data;
    mapDisplay(lacationData);
    }
    markerscodes();

    function mapDisplay(datas){

    

        var options = {
           
            center: { lat:Number(<?php echo $gam->latitude; ?>), lng:Number(<?php echo $gam->longitude; ?>) },
            zoom: 15
        }

     var map=new google.maps.Map(mapElement,options);


var markers= new Array();

for(let index=0; index < datas.length; index++){
markers.push({

    coords: { lat: Number(datas[index].latitude), lng:  Number(datas[index].longitude )},
    iconImage:`{{asset('images/sport.png')}}`,
                    
    content: `<div><a href='user/object/${datas[index].id}'><h5 style="color:red; ">Nazwa: ${datas[index].name}</h5></a> <p>Adres:<i></i>${datas[index].adress}</p><p>${datas[index].city},${datas[index].state}</p><p>Godziny: <small>${datas[index].hours}</small></p><img src='images/objects/${datas[index].picture}'></div>`
})
}

for ( var i = 0; i < markers.length; i++ ){
                addMarker(markers[i]);
            } 
    
        
        function addMarker(props){
            var marker = new google.maps.Marker({
                position: props.coords, 
                map:map
            });

            if(props.iconImage){
                marker.setIcon(props.iconImage);
            }

            if(props.content){

                var infowindow = new google.maps.InfoWindow({
                    content: props.content
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

            }
        }
        
            
    };
}



                    </script>
                        @endforeach
                       

                            <div class="panel-body">
                            <h3>Uczestnicy</h3>
                            <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <div class="feed-activity-list">
                                @foreach($gameuser as $gamuser)
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="images/user.png">
                                        </a>
                                        <div class="media-body ">
                                            
                                            <strong>{{$gamuser->email}} {{$gamuser->name}} {{$gamuser->surname}}</strong> Dołączył do  <strong>{{$gamuser->title}}</strong>. <br>
                                            
                                        </div>
                                       
                                    </div>
                                    @endforeach
                                </div>
                                
                           

                           
                            </div>
                            
                            </div>
                           
                            </div>
                           

                            </div>
                             
                            </div>
                           
                        </div>
                        
                      
                            
                  
                     
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
           
        </div>
        
   

   


<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
     <script>
   
   $(document).ready(function(){

     
       $('#addEventButton').on('click',function(){
        $('#button').css('visibility','visible');
        $('#dialog_book').dialog({

title:'Dodaj Gracza',
width:600,
height:500,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
});

       });

       $('#addEventButton1').on('click',function(){
        $('#button').css('visibility','visible');
        $('#dialog_book1').dialog({

title:'Zaproś zespół',
width:600,
height:300,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
});

       })


    $.ajaxSetup({
        headers:{
            'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
  
   });
   
   </script> 

    <style>
       
        div#map{

height: 500px;
width: 50%;


}
.container{
    width: 100%;
}
.project-people,
.project-actions {
  text-align: right;
  vertical-align: middle;
}
dd.project-people {
  text-align: left;
  margin-top: 5px;
}
.project-people img {
  width: 32px;
  height: 32px;
}
.project-title a {
  font-size: 14px;
  color: #676a6c;
  font-weight: 600;
}
.project-list table tr td {
  border-top: none;
  border-bottom: 1px solid #e7eaec;
  padding: 15px 10px;
  vertical-align: middle;
}
.project-manager .tag-list li a {
  font-size: 10px;
  background-color: white;
  padding: 5px 12px;
  color: inherit;
  border-radius: 2px;
  border: 1px solid #e7eaec;
  margin-right: 5px;
  margin-top: 5px;
  display: block;
}
.project-files li a {
  font-size: 11px;
  color: #676a6c;
  margin-left: 10px;
  line-height: 22px;
}


.profile-content {
  border-top: none !important;
}
.profile-stats {
  margin-right: 10px;
}
.profile-image {
  width: 120px;
  float: left;
}
.profile-image img {
  width: 96px;
  height: 96px;
}
.profile-info {
  margin-left: 120px;
}
.feed-activity-list .feed-element {
  border-bottom: 1px solid #e7eaec;
}
.feed-element:first-child {
  margin-top: 0;
}
.feed-element {
  padding-bottom: 15px;
}
.feed-element,
.feed-element .media {
  margin-top: 15px;
}
.feed-element,
.media-body {
  overflow: hidden;
}
.feed-element > .pull-left {
  margin-right: 10px;
}
.feed-element img.img-circle,
.dropdown-messages-box img.img-circle {
  width: 38px;
  height: 38px;
}
.feed-element .well {
  border: 1px solid #e7eaec;
  box-shadow: none;
  margin-top: 10px;
  margin-bottom: 5px;
  padding: 10px 20px;
  font-size: 11px;
  line-height: 16px;
}
.feed-element .actions {
  margin-top: 10px;
}
.feed-element .photos {
  margin: 10px 0;
}
.feed-photo {
  max-height: 180px;
  border-radius: 4px;
  overflow: hidden;
  margin-right: 10px;
  margin-bottom: 10px;
}
.file-list li {
  padding: 5px 10px;
  font-size: 11px;
  border-radius: 2px;
  border: 1px solid #e7eaec;
  margin-bottom: 5px;
}
.file-list li a {
  color: inherit;
}
.file-list li a:hover {
  color: #1ab394;
}
.user-friends img {
  width: 42px;
  height: 42px;
  margin-bottom: 5px;
  margin-right: 5px;
}

.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}
ul.notes li,
ul.tag-list li {
  list-style: none;
}

    </style>




</body>

</html>
