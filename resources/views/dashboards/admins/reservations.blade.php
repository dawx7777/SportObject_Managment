
<!DOCTYPE html>

<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>@yield('title')</title>

  <base href="{{\URL::to('/') }}">

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('css/chat-admin.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu"  role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

 
 
  </nav>
  

  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{\URL::to('/') }}" class="brand-link">
     
      <span class="brand-text font-weight-light">Panel Admin</span>
    </a>

    
    <div class="sidebar">
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()-> picture}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      

     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
               <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{(request()->is('admin/dashboard*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Strona Główna
                
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="{{route('admin.profile')}}" class="nav-link {{(request()->is('admin/profile*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Profile
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.listusers')}}" class="nav-link {{(request()->is('admin/listusers*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Użytkownicy
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.allreservations')}}" class="nav-link {{(request()->is('admin/allreservations*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Rezerwacje
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.addreservations')}}" class="nav-link {{(request()->is('admin/addreservations*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar-plus"></i>
              <p>
                Dodaj Rezerwacje
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.raports')}}" class="nav-link {{(request()->is('admin/raports*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Raporty
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.messages')}}" class="nav-link {{(request()->is('admin/messages*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Wiadomości
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.objects')}}" class="nav-link {{(request()->is('admin/objects*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
               Obiekty
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.games')}}" class="nav-link {{(request()->is('admin/games*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-futbol"></i>
              <p>
               Gry
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.teams')}}" class="nav-link {{(request()->is('admin/teams*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Zespoły
                
              </p>
            </a>
          </li>
          <br>
          <br>
          <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="nav-icon fas fa-sign-out-alt">   {{ __('Wyloguj') }} </i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
             
            
          </li>
        </ul>
      </nav>
      
    </div>
    
  </aside>


  <div class="content-wrapper">
    
    
  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">


    
   
   
  
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script  src="{{ asset('js/lang.js') }}"></script>
<div class="card">
    <br />
    <h1 class="text-center ">Zarezerwuj czas</h1>
    <br />
    <div class="mb-5">
        <button class="btn" id="addEventButton" style="background-color:#dc3545;"><i class="fa fa-plus" style="color:white" ></i></button>
        
    </div>

    <div id="calendar"></div>

</div>
<div id="dialog_book">
    <div id="dialog_body">
        <form id="dayClick" method="POST" action="{{route('storebookAdmin',$object->id)}}">
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


<style>
    #dialog_book{

       display: none; 
    }
    </style>
   
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        height:650,
        slotLabelFormat:"HH:mm",
        timeFormat: 'HH:mm',
        defaultView: 'agendaDay',
        editable:false,
        header:{
                left:'prev,next,today',
                center:'title',
                right:'mouth,agendaWeek,agendaDay'
                

        },
        eventSources: [


{
  url: "{{route('reservationEventsAdmin',$object->id)}}", 
    
 

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
  
  </div>
    



           
            
    </div>
    <script  src="{{ asset('js/lang.js') }}"></script>
@include('sweetalert::alert')


    
    
  </div>

  <aside class="control-sidebar control-sidebar-dark">
 
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
 

</div>





 
 
  

</body>
</html>
