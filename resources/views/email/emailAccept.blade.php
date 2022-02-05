@component('mail::message')


<h1 style="text-align:center; color:green; font-weight: bold;">Hura !! Twoja rezerwacja "{{$reservationsupdatestat['title']}}" została zaakceptowana </h1>
<h3 style="text-align:center; color:green; font-weight: bold;">Data_rezerwacji: {{$reservationsupdatestat['start']}} -  {{$reservationsupdatestat['end']}}</h3>

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent