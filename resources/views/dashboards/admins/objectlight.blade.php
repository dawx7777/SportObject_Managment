@extends('dashboards.admins.layouts.admin_dashboard-layout')
@section('title','Panel Administartora')

@section('content')

<!DOCTYPE html>
<meta chaset="UTF-8">
<head>
<link rel="stylesheet" href="{{ asset('css/light.css') }}">
</head>

<?php
function steruj($zm, $stan, &$doButtona, &$doNapisu, &$nowyStan)
{
	
	if($stan==0){
		$doButtona='button1';
		$doNapisu='WŁĄCZONE';
		$nowyStan=1;
		if($zm==1){
			
			
			shell_exec('gpio -g mode 17 out');
			shell_exec('gpio -g write 17 1');
		}
		}else{
			
		$doButtona='button2';
		$doNapisu='WYŁĄCZONE';
		$nowyStan=0;
		if($zm==1){
			shell_exec('gpio -g mode 17 out');
			shell_exec('gpio -g write 17 0');
		
		}
		
		}
}


?>

<body>





<?php

$stanpinu2=shell_exec('gpio -g read 17');
$czyZmiana=0;

if(isset($_POST['stan']))
{
	$czyZmiana=1;
	steruj($czyZmiana,$_POST['stan'],$jakiButon, $jakiNapis, $doStanu);
}else{

steruj($czyZmiana,$stanpinu2,$jakiButon, $jakiNapis, $doStanu);
	
}


?>
<div id='container'>

<h1>Sterowanie Oświetleniem obiektu</h1>
<h3>{{$objectlight['name']}}</h3>
<p>

<div class="col">
<legend>
Linia 1 - oświetlenie orlika
<fieldset>
<form action="{{ route('lightobject') }}" method='POST' class='centruj'>
    @csrf



<input type="submit" value="WYŁĄCZ" class="button2">
		<input name="stan" value="<?php echo $doStanu ?>" type="hidden">





</form>
<form action="{{ route('lightobjectoff') }}" method='POST' class='centruj'>
    @csrf


<input type="submit" value="WŁĄCZ" class="button1">
		<input name="stan" value="<?php echo $doStanu ?>" type="hidden">


		</legend>
</fieldset>

</form>
</div>
</p>

</div>
</body>
</html>

@endsection