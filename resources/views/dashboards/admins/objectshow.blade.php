@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')

<div class="card">
                <div class="object-imgs">
                    <img src="{{asset('images/objects/'. $obejctshow->picture)}}">
                </div>
                <div class="object-content">
                    <h2 class='object-title'>{{$obejctshow['name']}}</h2>
                    <div class="location">
                    <li><i class="fas fa-map-marked-alt"><span> {{$obejctshow['adress']}}, {{$obejctshow['city']}} </span> </i></li>
                    </div>
                    
                    <div class="object-booking">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    
                    </div>
                    <div class="object-details">
                        <h2>Cechy obiektu</h2>
                        <ul>
                        <li><i class="fas fa-check-circle" ></i> Typ: <span>{{$obejctshow['type']}}</span></li>
                        <li><i class="fas fa-check-circle" ></i> Wymiary: <span>{{$obejctshow['width']}}m x {{$obejctshow['lenght']}}m</span></li>
                        <li><i class="fas fa-check-circle" ></i> Oświetlenie: <span>{{$obejctshow['light']}}</span></li>
                        <li><i class="fas fa-check-circle" ></i> Typ gry: <span>{{$obejctshow['count']}}</span></li>
                        <li><i class="fas fa-check-circle" ></i> Godziny: <span>{{$obejctshow['hours']}}</span></li>
                       

                        </ul>
                    </div>
                    <div class="purchase-info">
                        <button type="button" class="btn">Rezerwuj</button>
                    </div>
                    <div class="social-links">
                        <p>Znajdź nas</p>
                        <a href="">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                </div>
            </div>

@endsection