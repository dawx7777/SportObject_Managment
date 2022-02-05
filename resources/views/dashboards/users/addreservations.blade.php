@extends('dashboards.users.layouts.user_dashboard-layout')
@section('title','Aplikacja Orlik')

@section('content')


<div class="content">
    <div class="row">
<div id="map">

</div>
</div>


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
           
            center: { lat:Number(datas[0].latitude), lng:Number(datas[0].longitude) },
            zoom: 13
        }

     var map=new google.maps.Map(mapElement,options);


var markers= new Array();

for(let index=0; index < datas.length; index++){
markers.push({

    coords: { lat: Number(datas[index].latitude), lng:  Number(datas[index].longitude )},
    iconImage:`{{asset('images/sport.png')}}`,
                    
    content: `<div><a href='user/reservationobject/${datas[index].id}'><h5 style="color:red; ">Nazwa: ${datas[index].name}</h5></a> <p>Adres:<i></i>${datas[index].adress}</p><p>${datas[index].city},${datas[index].state}</p><p>Godziny: <small>${datas[index].hours}</small></p><img src='images/objects/${datas[index].picture}'></div>`
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
    
<style>
 div#map{

height: 900px;
width: 100%;
}
</style>    

</div>

@endsection
