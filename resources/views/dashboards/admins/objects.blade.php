@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')
<div class="content">
<a href="{{route('admin.createobject')}}" class="btn btn-success" >

<i class="fa fa-plus" style="width:25px; height:25px;"></i>
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
      <th scope="col">Nazwa</th>
      <th scope="col">Adres</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longtitude</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Akcja</th>
      
      
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->name}}</td>
      <td>{{$post->adress}}, {{$post->city}}</td>
      <td>{{$post->latitude}}</td>
      <td>{{$post->longitude}}</td>
      <td><img src="{{asset('/images/objects/'. $post->picture)}}" style="width:100px; height:100px;"></td>
      <td class="table-buttons">
          <a href="{{route('admin.objectshow', $post->id)}}" class="btn btn-success">
              <i class="fa fa-eye" ></i>
          </a>
          <a href="{{route('admin.objectsedit', $post->id)}}" class="btn btn-primary">
              <i class="fa fa-info"></i>
          </a>
          <form method="POST" action="{{route('objectsdestroy',$post->id)}}">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">
              <i class="fa fa-trash" ></i>
          </button>
        
          </form>
          <a href="{{route('admin.objectlight', $post->id)}}" class="btn btn-light">
              <i class="fa fa-bolt" aria-hidden="true" style="color:yellow"></i>
          </a>

      
      <td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
<style>

    .table-buttons form{

display: contents;

    }
</style>


@endsection