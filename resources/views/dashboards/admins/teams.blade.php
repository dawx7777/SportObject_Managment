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
      <th scope="col">Nazwa zespołu</th>
      <th scope="col">Data Założenia</th>
      <th scope="col">Miejscowość</th>
      <th scope="col">Logo</th>
      <th scope="col">Założyciel</th>
      <th scope="col">Akcja</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($allteams as $allteam)
  
  <tr>
    <td scope="row">{{$allteam->id}}</td>
    <td>{{$allteam->teamname}}</td>
    <td>{{$allteam->start_date}}</td>
    <td>{{$allteam->place}}</td>

  <td>
  <img src="{{asset('images/teamlogo/'.$allteam->logoteam)}}" width="70px" width="70px"> 
  </td>
  <td>{{$allteam->email}}</td>

          <td>
          <form method="POST" action="{{route('adminteamsdestroy',$allteam->id)}}">
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

@include('sweetalert::alert')
</div>
<style>

    .table-buttons form{

display: contents;

    }
</style>


@endsection