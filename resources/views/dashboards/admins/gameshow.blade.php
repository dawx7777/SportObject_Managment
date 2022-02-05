@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')
<div class="content">
  @foreach($game as $gam)
            
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
            
        
          </form>

         
          @if(Auth::user()->email == $gam->email)
          <button class="btn" id="addEventButton" >ADD player</button>
          @endif
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
<li><i class="fa fa-futbol" aria-hidden="true"></i>
@endif
 @if ($gam->markers == 0)
    Brak odznaczników
@else 
<i class="fa fa-user" aria-hidden="true"></i></li>
@endif

                                    </dd>
                                </dl>
                            </div>
                            <div class="col-lg-6" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>Data rozpoczęcia:</dt> <dd>{{$gam->start}}</dd>
                                    <dt>Data zakończenia:</dt> <dd> {{$gam->end}}</dd>
                                    
                            </div>
                            <div class="col-lg-8">
                                 <div id="map">  


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Liczba uczestników:</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="width:<?php echo $gam->procent ?>%; background-color:gray; " class="progress-bar"></div>
                                        </div>
                                        <small>Zespół pełny w <strong>{{$gam->procent}}% </strong> Aby rozpocząć grę potrzebujemy 100%</small>
                                    </dd>
                                </dl>
                            </div>
                            
                            </div>
                            
                               
                        
                        <div id="dialog_book">
    <div id="dialog_body">
        <form id="dayClick" method="POST" action="">
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
<style>
    #dialog_book{

       display: none; 
    }
    div#map{

        display: block;
height: 500px;
width: 100%;
border: 3px solid gray;
margin-left: 300px;
}
    </style>
   
   
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
                    
    content: `<div><a href='user/object/${datas[index].id}'><h5 style="color:red; ">Nazwa: ${datas[index].name}</h5></a> <p>Adres:<i></i>${datas[index].adress}</p><p>${datas[index].city},${datas[index].state}</p><p>Godziny: <small>${datas[index].hours}</small></p><img src='${datas[index].picture}'></div>`
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
                     <script src="{{ asset('js/googlemap.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs7B7wjMPnxIIr_-1J7D8FblL4x6IdUXY&callback=initMap" async="false"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        @endforeach
                       
                       
                           

                            <div class="panel-body">
                            <h3>Uczestnicy</h3>
                            <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <div class="feed-activity-list">
                                @foreach($gameuser as $gamuser)
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="images/user.png" style="width:5% ;">
                                        </a>
                                        <div class="media-body ">
                                            
                                            <strong>{{$gamuser->email}} {{$gamuser->name}} {{$gamuser->surname}}</strong> Dołączył do  <strong>{{$gamuser->title}}</strong>. <br>
                                            <hr>
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





 
            
     

@include('sweetalert::alert')




@endsection
