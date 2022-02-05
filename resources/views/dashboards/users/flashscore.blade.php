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
      <th scope="col">Zespół 1</th>
      <th scope="col">Wynik</th>
      <th scope="col">Zespół 2</th>
      <th scope="col">Data spotkania</th>
      <th scope="col">Podejrzyj Relację</th>
      
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
          <a href="{{route('user.playgame', $flash->id)}}" class="btn btn-success">
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
