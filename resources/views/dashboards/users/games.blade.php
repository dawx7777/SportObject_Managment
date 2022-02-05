
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
            <div class="flex-center position-ref full-height">
            <div class="content">
         
                
                    

                </div>
                
               
<div class="pl-object">
    <div class="pl-object-choose">Najbliższe gry</div>
    
	<div class="join">
	<a href="{{route('user.makegame')}}"><button type="submit" class="btn btn-success" id="button" style="display:inline-block; background-color:green;"><i class="fa fa-plus-circle" ></i></button></a>
	</div>
	

    <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="object-slider" class="owl-carousel">
                    @foreach($games as $game)
						<div class="object-grid">
                        
								<div class="object-grid-txt">
									<span>{{$game->title}}</span>
                                    
									<h2></h2>
									<ul>
										<li><i class="fa fa-calendar" aria-hidden="true"></i> {{$game->start}} <small></small></li>
										<li><i class="fa fa-futbol-o" aria-hidden="true"></i>{{$game->name}}</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$game->adress}}, {{$game->city}} </li>
										<li><i class=" fa fa-check-square" aria-hidden="true"></i>Zapisanych {{$game->liczba}}/{{$game->count_players}}</li>
									</ul>
									
									<a href="user/game/{{$game->id}}">Przejdź...</a>
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
    
    <style>

        div#map{

            height: 500px;
            width: 100%;
        }
            .pl-object{

               background: radial-gradient( circle farthest-corner at 1.3% 2.8%,  rgba(239,249,249,1) 0%, rgb(168, 180, 201) 100.2% );;
                width:100%;
                height: 100%;
                
            }
            .object-sort{

                background-color: #f0f4fb;
                width:100%;
                height: 100%;
            }

            .col-xs-6 select{
                margin-left: 200px;
               margin-top: 20px;
            }
           
            .pl-object-choose{

                text-align: center;
                margin-bottom: 30px;
                font-size: 1.7em;
                font-weight: 700;
                font-family: Georgia, 'Times New Roman', Times, serif;
                color: #3a3768;
            }

            .object-wrap {
	width: 100%;
	padding: 30px 0;
}

.object-grid {
	width: auto;
	position: relative;
	background: #fff;
	border-radius: 5px;
	overflow: hidden;
	border: 1px solid #ddd;	/*box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);*/
	margin: 10px;
}

.object-grid-image {
	width: 100%;
	height: 280px;
	overflow: hidden;
}

.object-grid-image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: .5s;
}

.object-grid-box {
	display: block;
	position: absolute;
	text-align: center;
	background: #3a3768;
	left: -250px;
	top: 15px;
	padding: 10px;
	transition: .5s;
}

.object-grid-box h1 {
	color: #fff;
	font-size: 30px;
	font-weight: 400;
	letter-spacing: 2px;
	padding-bottom: 5px;
	border-bottom: 1px solid rgba(255, 255, 255, .3);
	margin-bottom: 5px;
}

.object-grid-box p {
	color: #fff;
	font-size: 14px;
	font-weight: 400;
	margin-bottom: 0px;
}

.object-grid-txt {
	padding: 25px;
}

.object-grid-txt span {
	color: #3a3768;
	font-size: 23px;
	font-weight: 700;
	letter-spacing: 4px;
	text-transform: uppercase;
}

.object-grid-txt h2 {
	color: #111;
	font-size: 20px;
	font-weight: 500;
	letter-spacing: 1px;
	margin: 10px 0px 5px 0px;
}

.object-grid-txt ul {
	padding: 0;
	margin: 0;
    color: #fff;
	font-size: 14px;
	font-weight: 400;
	margin-bottom: 0px;
}

.object-grid-txt ul li {
	list-style: none;
	display: inline-block;
	color: black;
	font-size: 20px;
	font-weight: 400;
	margin: 8px 10px 8px 0px;
	letter-spacing: 1px;
}

.object-grid-txt ul li i {
	color: red;
	font-size: 24px;
	font-weight: 500;
	margin-right: 5px;
}

.object-grid-txt li {
	color: #222;
	font-size: 14px;
	font-weight: 300;
	line-height: 170%;
	letter-spacing: 1.5px;
	border-bottom: 1px solid #ececec;
	padding-bottom: 15px;
	margin-bottom: 25px;
}

.object-grid-txt a {
	color: #fff;
	background: #3a3768;
	padding: 8px 20px;
	border-radius: 50px;
	font-size: 14px;
	font-weight: 300;
	line-height: 30px;
	letter-spacing: 1px;
	text-decoration-line: none;
	transition: .5s;
    margin-top: 40px;
}

/*Hover-Section*/
.object-grid:hover .object-grid-box {
	left: 15px;
	transition: .5s;
}

.object-grid:hover .object-grid-image img {
	filter: grayscale(1);
	transform: scale(1.1);
	transition: .5s;
}

.object-grid:hover .object-grid-txt a {
	text-decoration-line: none;
	color: #fff;
	letter-spacing: 2px;
	transition: .5s;
}

/*OWL*/
.owl-controls .owl-buttons {
	position: relative;
}

.owl-controls .owl-prev {
	position: absolute;
	left: -40px;
	bottom: 230px;
	padding: 8px 17px;
	background: #3a3768;
	border-radius: 50px;
	transition: .5s;
}

.owl-controls .owl-next {
	position: absolute;
	right: -40px;
	bottom: 230px;
	padding: 8px 17px;
	background: #3a3768;
	border-radius: 50px;
	transition: .5s;
}

.owl-controls .owl-prev:after, .owl-controls .owl-next:after {
	content: '\f104';
	font-family: FontAwesome;
	color: #fff;
	font-size: 16px;
}

.owl-controls .owl-next:after {
	content: '\f105';
}


.owl-controls .owl-prev:hover, .owl-controls .owl-next:hover {
	background: #000;
}


        
    </style>
    
    


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

    


</body>

</html>
