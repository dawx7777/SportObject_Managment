
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
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

 
    <ul class="navbar-nav ml-auto" style="text-align: center;">
    
      

     
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          @foreach($countunread as $count)
          <span class="badge badge-warning navbar-badge" id="pending1">{{$count->unread}}</span>
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            
          Masz {{$count->unread}} nieodczytanych wiadomości
          </a>
        
        
          <div class="dropdown-divider"></div>
          <a href="{{route('admin.messages')}}" class="dropdown-item dropdown-footer">Zobacz wszystkie</a>
        </div>
        @endforeach
      </li>
      @if(Auth::user())
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell-slash"></i>
          <span class="badge badge-danger navbar-badge">{{auth()->user()->unreadNotifications->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"></span>
          <div class="dropdown-divider"></div>
          @if(auth()->user()->unreadNotifications->count() )
          @foreach(auth()->user()->unreadNotifications as $notification)
          <div class="alert alert-danger" role="alert" style="height:67px; font-size:10px; margin-top:-15px;">

          Rezerwacja: {{$notification->data['reservation']['title']}},{{$notification->data['reservation']['start']}}
          
          <form method="POST" action="{{route('markNotification',$notification->id)}}">
            @csrf
          <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash" ></i>
          </button>
          </form>
          
            
                
        </div>
      
         
          @endforeach
          <form method="POST" action="{{route('markAllNotification')}}">
            @csrf
          <button type="submit" class="btn btn-danger">
              View all
          </button>
          </form>
          @else
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Brak powiadomień
            
          </a>
          @endif
         
        
        </div>
      </li>
      @endif

      <div class="container-fluid">
        

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown dropdown-notifications">
              <a href="#notifications-panel" style="color:gray;" data-toggle="dropdown">
                <i data-count="0" class="far fa-bell notification-icon"></i><span class="notif-count badge-warning navbar-badge ">0</span>
              </a>
              
              <div class="dropdown-container">
                <div class="dropdown-toolbar">
                  
                  
                </div>
                <ul class="dropdown-menu">
                </ul>
                <div class="dropdown-footer text-center">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
           
          </ul>
        </div>
      </div>
    
      
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
          <li class="nav-item">
            <a href="{{route('admin.flashscore')}}" class="nav-link {{(request()->is('admin/flashscore*')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
               Wyniki
                
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
    
    
 @yield('content')
    
    
  </div>

  <aside class="control-sidebar control-sidebar-dark">
 
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
 

</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

<script>

$.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });



  $(function(){
    /* UPDATE ADMIN PERSONAL INFO */
    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });
  
    $('#changePasswordAdminForm').on('submit',function(e){
      e.preventDefault();
      $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('#changePasswordAdminForm')[0].reset();
                  alert(data.msg);
                }
           }
          });
    });
  });
  </script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var receiver_id='';
        var my_id="{{Auth::id() }}";
        $(document).ready(function (){

            $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });

  Pusher.logToConsole = true;

var pusher = new Pusher('12560bd7e0eb48c5024a', {
  cluster: 'eu'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
 

  if(my_id == data.from){
      $('#' + data.to).click();
      
  }else if(my_id==data.to){
      if(receiver_id==data.from){
          $('#' + data.from).click();
      }else{
          var pending=parseInt($('#' + data.from).find('.pending').html());

          if(pending){
              $('#' + data.from).find('.pending').html(pending + 1);

          }else{
              $('#' + data.from).append('<span class="pending">1</span>');
          }
      }
  }
});

            $('.user').click(function (){
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();
                receiver_id=$(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "admin/message/"+receiver_id,
                    data:"",
                    cache: false,
                    success: function (data){
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });
            });

            $(document).on('keyup','.input-text input', function(e){

var message= $(this).val();

if(e.keyCode == 13 && message !='' && receiver_id !=''){
    $(this).val('');
    var datastr="receiver_id=" + receiver_id + "&message=" + message;
    $.ajax({

        type: "post",
        url: "admin/message",
        data: datastr,
        cache: false,
        success: function(data){

        },
        error: function (jqXHR, status, err){

        },
        complete: function(){
            scrollToBottomFunc();
        }
    })
}
});
 });

 function scrollToBottomFunc() {
        $('.messages-wrapper').animate({
            scrollTop: $('.messages-wrapper').get(0).scrollHeight
        }, 50);
    }


  
    </script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
  var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

      if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }
      var pusher = new Pusher('12560bd7e0eb48c5024a', {
        cluster: 'eu', 
      
      
      });
      var channel = pusher.subscribe('posts');
      channel.bind('App\\Events\\StatusNotification', function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
            
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.title+`</strong>
                  <strong class="notification-title">`+data.start+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      });
     </script>

</body>
</html>
