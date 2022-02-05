@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')


<div class="row">
    <div class="col-md-6 mx-auto">
    @include('sweetalert::alert')
    @if ($errors->any())
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="{{ route('storeobject') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="object-name">Nazwa</label>
    <input type="text" class="form-control" id="object-name" name="name" value="{{old('name')}}" placeholder="Podaj nazwę">
    <label for="object-adress">Adres</label>
    <input type="text" class="form-control" name="adress" id="object-adress" value="{{old('adress')}}" placeholder="Podaj adres">
    <label for="object-city">Miejscowość</label>
    <input type="text" class="form-control" id="object-city" name="city" value="{{old('city')}}" placeholder="Podaj miejscowość">
    <label for="object-state">Państwo</label>
    <input type="text" class="form-control" id="object-state" name="state" value="{{old('state')}}" placeholder="Podaj państwo">
    <label for="object-hours">Godziny</label>
    <input type="text" class="form-control" id="object-hours" name="hours" value="{{old('hours')}}" placeholder="Podaj godziny">
    <label for="object-latitude">Lokalizacja(latitude)</label>
    <input type="text" class="form-control" id="object-latitude" name="latitude" value="{{old('latitude')}}" placeholder="Podaj latitude">
    <label for="object-longitude">Lokalizacja(longitude)</label>
    <input type="text" class="form-control" id="object-longitude" name="longitude" value="{{old('longitude')}}" placeholder="Podaj longitude">
    <label for="object-lenght">Długość</label>
    <input type="number" class="form-control" id="object-lenght"  name="lenght" value="{{old('lenght')}}" placeholder="Podaj długość">
    <label for="object-width">Szerokość</label>
    <input type="number" class="form-control" id="object-width" name="width" value="{{old('width')}}" placeholder="Podaj szerokość">
  </div>
  <div class="form-group">
    <label for="object-type">Rodzaj nawierzchni</label>
    <select class="form-control" id="object-type" name="type" value="{{old('type')}}">
      <option>sztuczna</option>
      <option>półsztuczna</option>
      <option>trawiasta</option>
      <option>tartan</option>
    
    </select>
    <label for="object-light">Rodzaj światła</label>
    <select class="form-control" id="object-light" name="light" value="{{old('light')}}" >
      <option>halgoen</option>
      <option>LED</option>
      <option>brak</option>
      
    
    </select>
    <label for="object-count">Przeznaczenie</label>
    <select class="form-control" id="object-count" name="count" value="{{old('count')}}">
      <option>mniej</option>
      <option>5 vs 5</option>
      <option>6 vs 6</option>
      <option>7 vs 7</option>
      <option>więcej</option>
    </select>
  </div>
  <div class="form-group">
    <label for="object-picture">Wybierz zdjecie</label>
    <input type="file" class="form-control-file" id="object-picture" name="picture" value="{{old('picture')}}">
  </div>
  <button type="submit" class="btn btn-success">Zapisz</button>
</form>
</div>
</div>
@endsection