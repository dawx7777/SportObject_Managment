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
                <li class="breadcrumb-item active">Profil Użytkownika</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
  
      
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
             
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ Auth::user()->picture }}" alt="Zdjęcie użytkownika">
                  </div>
  
                  <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
  
                  <p class="text-muted text-center">Użytkownik</p>

                  <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn" style="width: 230px;"><b>Zmień zdjęcie</b></a>
                  
                </div>
                
              </div>
              
  
          
            </div>
            
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Informacje o użytkowniku</a></li>
                    <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Zmiana hasła</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form  method="POST" action="{{ route('userUpdateInfo') }}" id="UserInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Adres</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Adres" value="{{ Auth::user()->adress }}" name="adress">
                            <span class="text-danger error-text adress_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Telefon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Telefon" value="{{ Auth::user()->phone }}" name="phone">
                            <span class="text-danger error-text phone_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Zapisz</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    
                    <div class="tab-pane" id="change_password">
                        <form  action="{{route('userChangePassword')}}" method="POST" id="changePasswordUserForm" class="form-horizontal">
                        
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Stare hasło</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputName" placeholder="Wpisz obecne hasło" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Nowe hasło</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="newpassword" placeholder="Wpisz nowe hasło" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Powtórz nowe hasło</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="cnewpassword" placeholder="Powtórz nowe hasło" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Zapisz</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
           
          </div>
          
        </div>
      </section>
@endsection