@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')

<div class="content">
@include('sweetalert::alert')
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
      <th scope="col">Email</th>
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Adress</th>
      <th scope="col">Telefon</th>
      <th scope="col">Akcja</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($listusers as $listuser)
    <tr>
      <th scope="row">{{$listuser->id}}</th>
      <td>{{$listuser->name}}</td>
      <td>{{$listuser->email}}</td>
      <td>{{$listuser->imie}}</td>
      <td>{{$listuser->nazwisko}}</td>
      <td>{{$listuser->adress}}</td>
      <td>{{$listuser->phone}}</td>
      <td class="table-buttons">
         
          
          <form method="POST" action="{{route('usersdestroy',$listuser->id)}}">
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
</div>
<style>

    .table-buttons form{

display: contents;

    }
</style>

@endsection