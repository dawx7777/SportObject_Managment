@extends('dashboards.users.layouts.user_dashboard-layout')
@section('title','Aplikacja Orlik')

@section('content')
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Wiadomości</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
<div class="card" style="margin: 10px 10px 10px 10px; ">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="user-wrapper">
                <ul class="users">
                    @foreach($users as $user)
                    <li class="user" id="{{$user->id}}">

                    @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif
                        

                        <div class="media">
                            <div class="media-left">
                                <img src="{{asset('/users/images/'. $user->picture)}}" alt="" class="media-object">
                            </div>
                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->email}}</p>
                            </div>
                        </div>
                    </li>
                    
                    @endforeach
                  
                </ul>
            </div>
        </div>
        <div class="col-md-8" id="messages">
        
        </div>
    </div>
</div>
</div>
      </section>
@endsection