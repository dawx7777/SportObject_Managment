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
      <th scope="col">Tytuł Gry</th>
      <th scope="col">Opis</th>
      <th scope="col">Liczba graczy</th>
      <th scope="col">Piłka</th>
      <th scope="col">Odznaczniki</th>
      <th scope="col">Miejsce</th>
      <th scope="col">Czas rozpoczęcia</th>
      <th scope="col">Akcja</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($allgames as $post)
  
    <tr>
      <td scope="row">{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->count_players}}</td>
      @if ($post->ball == 0)
    <td>Brak</td>
@else 
<td>Tak</td>
@endif
      
@if ($post->markers == 0)
    <td>Brak</td>
@else 
<td>Tak</td>
@endif
    
    <td>{{$post->name}}</td>
    <td>{{$post->start}}</td>
   

          <td>
          <form method="POST" action="{{route('admingamesdestroy',$post->id)}}">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash" ></i>
          </button>
          </form>

          <a href="{{route('admin.gameshow',$post->id)}}" class="btn btn-success">
              <i class="fa fa-eye" ></i>
          </a>
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