@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')
<div class="content">

@if (session()->get('success'))
        <div class="alert alert-success mt-3">
            <p>{{session()->get('success')}}</p>
        </div>
    @endif
<table class="table table-striped mt-3">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Adres</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longtitude</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Raport</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($objectraports as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->name}}</td>
      <td>{{$post->adress}}, {{$post->city}}</td>
      <td>{{$post->latitude}}</td>
      <td>{{$post->longitude}}</td>
      <td><img src="{{asset('images/objects/'.$post->picture)}}" style="width:100px; height:100px;"></td>
      <td class="table-buttons">
          <a href="{{route('admin.daypdf',$post->id)}}" class="btn btn-success">
              Dzienny
          </a>
          
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#raportModal">
  Całkowity
</button>
      </td>
    </tr>
    <div class="modal fade" id="raportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="dayClick" method="GET" action="{{route('admin.alldaypdf',$post->id)}}">
        @csrf
        <div class="form-group">
            <label>Wybierz zakres od jakiego terminu ?</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Wybierz datę początkową raportu">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Dodaj</button>
           
        </div>
        </form>
    </div>
  </div>
</div>
    @endforeach
  </tbody>
</table>
</div>

  
    
<style>

    .table-buttons form{

display: contents;

    }

    #dialog_book{

display: none; 
}
</style>


<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
     <script>
 
   $(document).ready(function(){

     
       $('#addEventButton').on('click',function(){
        $('#button').css('visibility','visible');
        $('#dialog_book').dialog({

title:'Podaj zakres',
width:600,
height:500,
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
@endsection

