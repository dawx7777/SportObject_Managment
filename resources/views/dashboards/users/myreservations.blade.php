


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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
            <div class="card">



</a>
@if (session()->get('success'))
        <div class="alert alert-success mt-3">
            <p>{{session()->get('success')}}</p>
        </div>
    @endif
<table class="table table-striped mt-3">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tytuł rezerwacji</th>
      <th scope="col">Nazwa obiketu</th>
      <th scope="col">Rozpoczęcie</th>
      <th scope="col">Zakończenie</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Status</th>
      <th scope="col">Akcja</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
  
    <tr>
      <td scope="row">{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->name}}</td>
      <td>{{$post->start}}</td>
      <td>{{$post->end}}</td>
      <td><img src="{{asset('/images/objects/'. $post->picture)}}" style="width:100px; height:100px;"></td>
      @if ($post->status == 0)
    <td style="color:red;">Niezatwierdzone</td>
@else 
<td style="color:green;">Zatwierdzone</td>
@endif
      <td>
         
   
      @if ($post->status == 0)
            <a class=" btn editbtn"><i class="fa fa-info" style="color:white"></i></a>
            @endif
            @include('sweetalert::alert')
          <form method="POST" action="{{route('myreservationsdestroy',$post->id)}}">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash" ></i>
          </button>
          </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
<div class="text-center">
  {{$posts ->links()}}
</div>
</div>
 

<div id="dialog_book">
    <div id="dialog_body">
        <form id="editFormID" method="POST">
        @csrf
        @method('PUT') 
     

  <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label>Nazwa rezerwacji(Imie, nazwisko)</label>
            <input type="text" class="form-control" name="title" id="title"  placeholder="Nadaj tytuł rezerwacji">
        </div>
        <div class="form-group">
            <label>Data i czas rozpoczęcia</label>
            <input type="datetime" id="start" class="form-control" name="start"  placeholder="Data rozpoczęcia">
        </div>
        <div class="form-group">
            <label>Data i czas zakończenia</label>
            <input type="datetime"  id="end" class="form-control" name="end"  placeholder="Data zakończenia">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Zmień</button>
           
        </div>

        </form>
        
    </div>
    
</div>
           
            
         

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>

  .w-5{
    display: none;
  }
  
    .table-buttons form{

display: contents;

    }

    #dialog_book{

display: none; 
}
</style>






<script>
$(document).ready(function(){

    $('.editbtn').on('click',function(){
        $('#dialog_body').dialog({

title:'Zmień daty lub tytuł rezerwacji. Jeśli chcesz zmienić miejsce rezerwacji usuń i ponów dodanie',
width:600,
height:500,
modal:true,
show:{effect:'clip',duration:350},
hide:{effect:'clip',duration:250}
});

$tr=$(this).closest('tr');

var data=$tr.children("td").map(function(){

    return $(this).text();
}).get();

console.log(data);
$('#id').val(data[0]);
$('#title').val(data[1]);
$('#start').val(data[3]);
$('#end').val(data[4]);

    });



    $('#editFormID').on('submit',function(e){

        e.preventDefault();

        var id=$("#id").val();


        $.ajax({

            type:"POST",
            url: "user/myreservationsupdate/"+id,
            data: $('#editFormID').serialize(),
           success:function(response){
               console.log(response);
               $('#dialog_body').modal('hide');
               swal({
  title: "Zmieniłeś dane",
  text: "Kliknij w przycisk",
  icon: "success",
  button: "OK",
  timer: 30000,
});

location.reload(true);
tr.hide();
           },
           error: function(error){
            console.log(error);
               $('#dialog_body').modal('hide');
               swal({
  title: "Podałeś złe dane",
  text: "Kliknij w przycisk",
  icon: "error",
  button: "OK",
  timer: 30000,
});

           }
            
        })
    })

    
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

  




</body>

</html>
