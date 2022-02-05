@extends('dashboards.users.layouts.user_dashboard-layout')
@section('title','Aplikacja Orlik')

@section('content')

<div class="col-md-8 mx-auto" style="background-color: white; margin-top:10px; ">
 
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
 
 <div class="text-class">
     <h1 style="font-size:30px; text-align:center; font-weight:bold;">Stwórz zespół</h1>
     <img src="images/teamv2.png" class="image-sport" style="margin-right: 10px;">
     </div>


<form method="POST" action="{{ route('storeteam') }}" enctype="multipart/form-data">

@csrf
<div class="form-group">

<div class="form-wrapper">
 <label for="team-title">Nazwa Zespołu</label>
 <input type="text" class="form-control" id="teamname" name="teamname"  placeholder="Podaj nazwę roboczą">
</div>
<div class="form-wrapper">
 <label for="team-date">Data Założenia</label>
 <input type="date" class="form-control" name="start_date" id="start_date"  placeholder="Podaj date założenia">
</div>
<div class="form-wrapper">
 <label for="team-place">Miejsce/siedziba</label>
 <input type="text" class="form-control" name="place" id="place"  placeholder="Podaj siedzibę zespołu">
</div>
<div class="form-wrapper">
 <label for="team-logo">Wybierz logo</label>
 <input type="file"  name="logoteam" id="logoteam" placeholder="Wybierz logo zespołu">
</div>



<button type="submit" class="btn btn-success">Stwórz</button>
</form>

            </div>
           
</div>
        </div>


@endsection
<style>
    input[type=text]{
    width: 100%;
    padding: 12px 20px;
    margin: 10px 0 0 0;
    display: inline-block;
    border-radius: 20px !important;
    box-sizing: border-box;
    outline: none;
    border: 3px solid #3a3768 !important;
}


</style>