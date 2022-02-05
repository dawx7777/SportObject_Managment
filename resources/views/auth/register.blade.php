<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orlikowa</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital@1&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container">
	<div class="form">
	
        <form method="POST" class="form1" autocomplete="off" action="{{ route('register') }}" >
           
								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
            <h2>REJESTRACJA</h2>
			@csrf
			<input id="name" type="text"  name="name" value="{{ old('name') }}" class="box"  autofocus placeholder="Wprowadź login">
            <br><span class="text-danger">@error('name'){{ $message }}@enderror</span></br>
            <input id="email" type="email"  name="email" value="{{ old('email') }}" class="box"  autofocus placeholder="Wprowadź email">
            <br><span class="text-danger">@error('email'){{ $message }}@enderror</span></br>
			<input id="imie" type="text"  name="imie" value="{{ old('imie') }}" class="box"  autofocus placeholder="Wprowadź Imię">
            <br><span class="text-danger">@error('imie'){{ $message }}@enderror</span></br>
			<input id="nazwisko" type="text"  name="nazwisko" value="{{ old('nazwisko') }}" class="box"  autofocus placeholder="Wprowadź Nazwisko">
            <br><span class="text-danger">@error('nazwisko'){{ $message }}@enderror</span></br>
            <input id="adress" type="text"  name="adress" value="{{ old('adress') }}" class="box"  autofocus placeholder="Wprowadź adres">
            <br><span class="text-danger">@error('adress'){{ $message }}@enderror</span></br>
            <input id="phone" type="text"  name="phone" value="{{ old('phone') }}" class="box"  autofocus placeholder="Wprowadź numer telefonu">
            <br><span class="text-danger">@error('phone'){{ $message }}@enderror</span></br>
            <input id="password" type="password"  name="password" class="box"  data-eye placeholder="Wpisz hasło">
           <br> <span class="text-danger">@error('password'){{ $message }}@enderror</span></br>
           <input id="password-confirm" type="password"  name="password-confirm" class="box"  data-eye placeholder="Potwierdź hasło">
           <br> <span class="text-danger">@error('password-confirm'){{ $message }}@enderror</span></br>
            <input type="submit" value="ZAREJESTRUJ" id="submit">
			</form>
			

            <a href="{{route('login')}}" class="float-right">
                Jeśli posiadasz konto idź do Logowania
           </a>
		   </div>
        <div class="side">

            <img src="images/image.png">
        </div>
    </div>
	
</body>
</html>