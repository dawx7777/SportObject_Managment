<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
    <title>Document</title>
</head>
<body>
@foreach($nameobject as $nameobj)
<p style="font-size:20px;">{{$nameobj->name}}<p>
    @endforeach
    <p>Data wydruku:<?php echo now(); ?> </p>
    <p>Dzienny raport z rezerwacji obiektu</p>

    <table class="table table-striped"  id="revtable">
  
  
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tytuł rezerwacji</th>
      <th scope="col">Email użytkownika</th>
      <th scope="col">Nazwa obiektu</th>
      <th scope="col">Rozpoczęcie</th>
      <th scope="col">Zakończenie</th>
      <th scope="col">Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($data as $allre)
  
    <tr>
      <td scope="row">{{$allre->id}}</td>
      <td>{{$allre->title}}</td>
      <td>{{$allre->email}}</td>
      <td>{{$allre->name}}</td>
      <td>{{$allre->start}}</td>
      <td>{{$allre->end}}</td>
      @if ($allre->status == 0)
    <td style="color:red;">Niezatwierdzone</td>
@else 
<td style="color:green;">Zatwierdzone</td>
@endif
    
    </tr>
    @endforeach
    
  </tbody>
</table>
</body>
<style>



body {
  font-family: DejaVu Sans;
    margin: 0;
    padding: 0;
    font-size: 10px;
    background-image: linear-gradient(315deg, #9fa4c4 0%, #9e768f 74%);
    background-size: cover;
  }

  h1{
    font-family: DejaVu Sans;
  }
</style>
</html>