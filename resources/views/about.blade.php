
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orlikowa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="about.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital@1&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous">

</script>

<script src="textyle.min.js"></script>

</head>
<body>
    <body style="background-image: radial-gradient( circle farthest-corner at 1.3% 2.8%,  rgba(239,249,249,1) 0%, rgb(199, 207, 219) 100.2% );"></body>
    <header>
        <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
          <div class="navbar-nav ml-auto">
         
              <a class="nav-item nav-link" href="{{ url('/home') }}">GŁÓWNA <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="">O PRACY</a>
              <a class="nav-item nav-link " href="#">KONTAKT</a>
            <a href="{{ route('login') }}" style="padding-top: 5px; font-size: 9px;"><button class="button" style="vertical-align: middle"><span>ZALOGUJ</span></button></a>
        </div>
        </div>
      
    </section>
</nav>
</header>
<img class="wave" src="wave.png">
<div class="img_log">
			
    <div id="pole" >

		<h3 class="title1 text-center py-3">O Pracy</h3>
<h5 style="text-align:center;">Projekt zrealizowany w ramach pracy dyplomowej realizujący założenia ujęte w wymaganiach projektowych.</h5></br>
<p><b>Tytuł pracy:</b> System automatyzacji obsługi obiektów sportowych typu Orlik</p>
<p><b>PWSZ Instytut Techniczny 2022</b></p>
<p><b>Autor:</b> Dawid Zawiślan
</p>
<p><b>Kierunek: </b> Informatyka Stosowana </p>
<p><b>Promotor: </b> dr hab. inż. Marek Aleksander</p>

	
    </div>
</div>
</div>
</div>
</body>

</html>
