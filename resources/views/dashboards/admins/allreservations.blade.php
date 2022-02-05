@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')
<div class="content">
@if (session()->get('success'))
        <div class="alert alert-success mt-3">
            <p>{{session()->get('success')}}</p>
        </div>
    @endif

    @include('sweetalert::alert')


    <table class="table table-striped mt-3" id="revtable">
  <form class="form-inline" method="GET" action="{{route('admin.searchreser')}}">
    <label for="category_filter">Sortuj</label>
    
<select data-column="0" class="form-control filter-select" id="name" name="name">

<option value="">Wybierz obiekt</option>
@foreach(App\Models\objects::all() as $obj)
<option>{{$obj->name}}</option>
@endforeach
</select>

<select data-column="0" class="form-control filter-select" id="status" name="status">

<option value=""> Wybierz Status</option>

<option>Zatwierdzone</option>
<option>Niezatwierdzone</option>


</select>
<input type="date" class="form-control" name="date" id="date" placeholder="Wybierz datę od kiedy(czas utworzenia rezerwacji)">
<input type="text" class="form-control" name="code" id="code" placeholder="Wprowadź kod rezerwacji z maila">
<button type="submit" class="btn btn-primary">Wyszukaj</button>

  </form>
  
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tytuł rezerwacji</th>
      <th scope="col">Email użytkownika</th>
      <th scope="col">Nazwa obiektu</th>
      <th scope="col">Rozpoczęcie</th>
      <th scope="col">Zakończenie</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Status</th>
      <th scope="col">Akcja</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($allres as $allre)
  
    <tr>
      <td scope="row">{{$allre->id}}</td>
      <td>{{$allre->title}}</td>
      <td>{{$allre->email}}</td>
      <td>{{$allre->name}}</td>
      <td>{{$allre->start}}</td>
      <td>{{$allre->end}}</td>
      <td><img src="{{asset('images/objects/'.$allre->picture)}}" style="width:100px; height:100px;"></td>
      @if ($allre->status == 0)
    <td style="color:red;">Niezatwierdzone</td>
@else 
<td style="color:green;">Zatwierdzone</td>
@endif
      <td>
         
      <form method="POST" action="{{route('reservationsupdatestat',$allre->id)}}">
      @csrf
            
      <button type="submit" class="btn btn-success">
              <i class="fa fa-check" ></i>
              @include('sweetalert::alert')
              </form>
          <form method="POST" action="{{route('reservationsdestroy',$allre->id)}}">
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
<div class="text-center">
  {{$allres ->links()}}
</div>
</div>
</div>
<style>
  .w-5{
    display: none;
  }
  </style>




@endsection
