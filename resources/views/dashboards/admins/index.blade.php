@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')

<div class="row" style="margin-top:100px;">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @foreach($reservationsallcountday as $allcountday)
                <h6>Ogółem dziś: {{$allcountday->liczba}} </h5>
@endforeach
                @foreach($reservationsallcount as $allcount)
                <h5>Ogółem: {{$allcount->liczba}} </h5>
@endforeach
                <p>Rezerwacje</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="{{route('admin.allreservations')}}" class="small-box-footer">Więcej <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @foreach($gamesallcount as $allcountgame)
                <h3>{{$allcountgame->liczba}}<sup style="font-size: 20px"></sup></h3>
                @endforeach
                <p>Gry</p>
              </div>
              <div class="icon">
                <i class="ion ion-xbox"></i>
              </div>
              <a href="{{route('admin.games')}}" class="small-box-footer">Więcej <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @foreach($usersallcount as $allcountuser)
                <h3>{{$allcountuser->liczba}}</h3>
                @endforeach
                <p>Zarejestrowani użytkownicy</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.listusers')}}" class="small-box-footer">Więcej <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @foreach($objectsallcount as $allcountobject)
                <h3>{{$allcountobject->liczba}}</h3>
                @endforeach
                <p>Liczba obiektów</p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
              <a href="{{route('admin.objects')}}" class="small-box-footer">Więcej <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
@endsection