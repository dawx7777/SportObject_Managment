
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
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="{{ asset('js/googlemap.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs7B7wjMPnxIIr_-1J7D8FblL4x6IdUXY&callback=initMap" async="false"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" crossorigin="anonymous" />
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
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
            <div class="col-md-8 mx-auto" style="background-color: white; margin-top:10px; ">
 
 @include('sweetalert::alert')
 @if ($errors->any())
     <div class="alert alert-danger">
         
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{$error}}</li>
             @endforeach
         </ul>
     </div>
 @endif
 <div class="text-class">
     <h1 style="font-size:30px; text-align:center; font-weight:bold;">Dodaj Grę</h1>
     <img src="images/image.png" class="image-sport">
     </div>

    
 


<form method="POST" action="{{ route('storegame') }}">

@csrf
<div class="form-group">

<div class="form-wrapper">
 <label for="game-title">Tytuł</label>
 <input type="text" class="form-control" id="game-title" name="title"  placeholder="Podaj nazwę roboczą">
</div>
<div class="form-wrapper">
 <label for="game-description">Opis</label>
 <input type="text" class="form-control" name="description" id="game-description"  placeholder="Podaj opis">
</div>
 <div class="checkbox">
 <label for="game-markers">Koszulki(zaznacz jeśli posiadasz)</label>
 <input type="checkbox" name="markers" class="form-check" id="game-markers" value="1">
<br>
</div>
<div class="checkbox">
<label for="game-ball">Piłka(zaznacz jeśli posiadasz)</label>
 <input type="checkbox" name="ball" class="form-check" id="game-ball" value="1" >
 <br>
</div>
<div class="form-wrapper">
 <label for="object-type">Ilość graczy</label>
 <select class="form-control" id="game-count_players" name="count_players" >
 <option>10</option>
 <option>12</option>
   <option>14</option>
   <option>16</option>
   <option>18</option>
 
 </select>
</div>
<div class="form-wrapper">
 <label for="object-light">Wybierz rezerwacje </label>
 
 <select class="form-control" id="object-light" name="reservation_id" >
 @foreach($reserv as $res)
 <option  value="{{$res->id}}" name="{{$res->id}}" id="{{$res->id}}" >{{$res->title}},Start: {{$res->start}} </option>
   
   @endforeach
 </select>
</div>
</div>
<button type="submit" class="btn btn-success" style="margin-left:70px;">Stwórz</button>
</form>

            </div>
           
</div>
        </div>
       
 




        <script type="text/javascript">
													$(document).ready(function(){
														$("#object-slider").owlCarousel({
															items:3,
															navigation:true,
															navigationText:["",""],
															autoPlay:true
														});
													});
												</script>
    
  
    
    




    


</body>
<style>
    .wrapper{

        
    }
    </style>
</html>
