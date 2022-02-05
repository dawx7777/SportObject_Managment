@extends('dashboards.users.layouts.user_dashboard-layout')
@section('title','Aplikacja Orlik')

@section('content')

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
      <th scope="col">Nazwa zespołu</th>
      <th scope="col">Data Założenia</th>
      <th scope="col">Miejscowość</th>
      <th scope="col">Logo</th>
      <th scope="col">Założyciel</th>
      <th scope="col">Podejrzyj</th>
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
          <a href="{{route('user.teamdetail', $allteam->id)}}" class="btn btn-success">
              <i class="fa fa-eye" ></i>
          </a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
 
@include('sweetalert::alert')


@endsection
