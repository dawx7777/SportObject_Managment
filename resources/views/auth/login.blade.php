<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orlikowa</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital@1&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container">
	<div class="form">
        
        <form method="POST" class="form1" autocomplete="off" action="{{ route('login') }}" >
           
            <h2>LOGOWANIE</h2>
			@csrf
			
            <input id="email" type="email"  name="email" value="{{ old('email') }}" class="box"  autofocus placeholder="Enter email">
            <br><span class="text-danger">@error('email'){{ $message }}@enderror</span></br>
            <input id="password" type="password"  name="password" class="box"  data-eye placeholder="Enter password">
           <br> <span class="text-danger">@error('password'){{ $message }}@enderror</span></br>
            <input type="submit" value="ZALOGUJ" id="submit">
			</form>
			
            <a href="{{route('register')}} "><button class="button" style="vertical-align: middle">ZAREJESTRUJ</button></a>
            <a href="{{route('password.request')}}" class="float-right">
                Zapomniałeś hasła?
           </a>
		   </div>
        <div class="side">

            <img src="images/image.png">
        </div>
    </div>
</body>
</html>