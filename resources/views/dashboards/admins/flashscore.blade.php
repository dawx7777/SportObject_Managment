@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')

<div class="content">



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
      <th scope="col">Zespół 1</th>
      <th scope="col">Wynik</th>
      <th scope="col">Zespół 2</th>
      <th scope="col">Data spotkania</th>
      <th scope="col">Aktualizuj wynik</th>
      
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($flashscore as $flash)
  
    <tr>
      <td scope="row">{{$flash->id}}</td>
      <td>{{$flash->first}}</td>
      <td>{{$flash->first_team_score}} : {{$flash->second_team_score}}</td>
      <td>{{$flash->second}}</td>

    
    <td>{{$flash->start}}</td>
   

          <td>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#wynikModal">
              <i class="fa fa-eye" ></i>
          </a>
          </td>
          <div class="modal fade" id="wynikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="dayClick" method="POST" action="{{route('flashscoreadminupdate',$flash->id)}}">
    @csrf
  @method('PUT')
        <div class="form-group">
            <label>Wynik 1 zespołu</label>
            <input type="number" class="form-control" name="firstteam" id="firstteam" placeholder="Gole pierwszego zespołu">
        </div>
        <div class="form-group">
            <label>Wynik 2 zespołu</label>
            <input type="number" class="form-control" name="secondteam" id="secondteam" placeholder="Gole drugiego zespołu">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="button" style="display:inline-block;">Dodaj</button>
           
        </div>
        </form>
    </div>
  </div>
</div>
    </tr>

    @endforeach
    
  </tbody>
</table>
</div>
 
@include('sweetalert::alert')

@endsection