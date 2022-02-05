
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <title>@yield('title')</title>
    <base href="{{\URL::to('/') }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/lang-all.js"></script>
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

           
            
            <div class="card">
    <br />
    <h1 class="text-center ">Zarezerwuj czas</h1>
    <br />
    <div class="mb-5">
        <button class="btn" id="addEventButton" style="background-color:#dc3545;"><i class="fa fa-plus-circle" ></i></button>
        
    </div>

    <div id="calendar"></div>

</div>
<div id="dialog_book">
    <div id="dialog_body">
        <form id="dayClick" method="POST" action="{{route('storebook',$object->id)}}">
        @csrf
        <div class="form-group">
            <label>Nazwa rezerwacji(Imie, nazwisko)</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nadaj tytuł rezerwacji">
        </div>
        <div class="form-group">
            <label>Data i czas rozpoczęcia</label>
            <input type="text" id="start" class="form-control" name="start" placeholder="Data rozpoczęcia">
        </div>
        <div class="form-group">
            <label>Data i czas zakończenia</label>
            <input type="text"  id="end" class="form-control" name="end" placeholder="Data zakończenia">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Dodaj</button>
           
        </div>

        </form>
    </div>
    
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    #dialog_book{

       display: none; 
    }
    </style>
   <script>
   
   $(document).ready(function(){

       function convert(str){

           const d= new Date(str);
           let month='' + (d.getMonth() + 1);
           let day= '' + d.getDate();
           let year= d.getFullYear();
           if(month.length < 2) month='0' + month;
           if(day.length < 2 ) day='0' + day;
           let hour=''+d.getUTCHours();
           let minutes=''+d.getUTCMinutes();
           let seconds=''+d.getUTCSeconds();
           if(hour.length < 2) hour='0' + hour;
           if(minutes.length < 2) minutes='0' + minutes;
           if(seconds.length < 2) seconds='0' + seconds;

           return [year,month,day].join('-')+' '+[hour,minutes,seconds].join(':');
       };
       $('#addEventButton').on('click',function(){
        $('#button').css('visibility','visible');
        $('#dialog_book').dialog({

title:'Dodaj rezerwacje',
width:600,
height:500,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
})

       })

    $.ajaxSetup({
        headers:{
            'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar=$('#calendar').fullCalendar({
        minTime: "08:00:00",
        maxTime: "22:00:00",
        selectable:true,
        showNonCurrentDates:false,
        locale:'pl',
        timeFormat: 'HH:mm',
        slotLabelFormat:"HH:mm",
        height:650,
        defaultView: 'agendaDay',
        editable:false,
        header:{
                left:'prev,next,today',
                center:'title',
                right:'mouth,agendaWeek,agendaDay'
                

        },
        eventSources: [


{
  url: "{{route('reservationEvents',$object->id)}}", 
    
 

}

],

       
       dayClick:function(date,event,view){
        $('#start').val(convert(date));
        $('#button').css('visibility','visible');
        $('#dialog_book').dialog({

            title:'Dodaj rezerwacje',
            width:600,
            height:500,
            modal:true,
            show:{effect:'clip',duration:350},
            hide:{effect:'clip',duration:250}
        })
       },
       select:function(start,end){

           if(start.isBefore(moment())){
               $('#calendar').fullCalendar({

                selectable:false,
                editable:false,
                
                borderColor: 'yellow',
                
               });
              
               
               return false;
           }else{
        $('#button').css('visibility','visible');
           $('#start').val(convert(start));
           $('#end').val(convert(end))
           
           $('#dialog_book').dialog({

title:'Dodaj rezerwacje',
width:600,
height:500,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
})
           }
       },
      eventClick:function(event){

        $('#title').val(event.title);
        $('#start').val(convert(event.start));
        $('#end').val(convert(event.end));
        $('#button').css('visibility','hidden');
        $('#dialog_book').dialog({    

title:'Informacje o rezerwacji',
width:600,
height:500,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
})
      }
    });
   });
   
   </script> 
@include('sweetalert::alert')




   

    
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

    <style>


.card-wrapper{

    max-width: 1100px;
    margin: 0 auto;
}

img{
    
    display: block;
    justify-content: center;
}

.object-content{

    padding: 2rem 1rem;
}

.object-title{

    font-size: 3rem;
    text-transform: capitalize;
    font-weight: 700;
    position: relative;
    color:#3a3768;
    margin:1rem 0;
    
}

.object-title::after{

    content:"";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 50px;
    background-color:#3a3768 ;
   

}
.object-rating{

    color:gold;
}
.object-rating span{
    font-weight: 600;
    color: gold;
}
.object-details h2{

    
    color: #3a3768;
    padding-bottom: 0.6rem;
}
.object-details p{
font-size: 0.9rem;
padding: 0.3rem;
opacity: 0.8;
color: #3a3768;
}
.object-details li{

    margin: 1rem 0;
    font-size: 0.9rem;
    margin-top: 10px;
    margin-left: 20px;
   
}
.object-details i{

    color: green;
}

.object-details i ul li{

    margin:0;
    list-style: none;
    background-size: 18px;
    padding-left: 1.7rem;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}

.object-details ul li i span{

    font-weight: 400;
}


.social-links{
    display: flex;
    align-items: center;
    
   
}
.social-links a{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color:#3a3768;
    border: 1px solid #3a3768;
    margin: 0 0.2rem;
    border-radius: 50%;
    text-decoration: none;
    font-size: 0.8rem;
    transition: all 0.5s ease;
    text-align: center;
}

.social-links a:hover{

    background: #3a3768;
    border-color: transparent;
    color:#fff;
}
.purchase-info{

    margin: 1.5rem 0;
    
}
.purchase-info .btn{

    
}
.location i{

    color:#3a3768;
    font-size: 1.2rem;
}


    </style>




</body>

</html>
