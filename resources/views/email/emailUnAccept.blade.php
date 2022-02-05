@component('mail::message')


<h1 style="text-align:center; color:red; font-weight: bold;">Niestety z przykrością informujemy, Pańska rezerwacja  "{{$reservationsdestroy['title']}}" została odrzucona przez administratora </h1>
<h3 style="text-align:center; color:red; font-weight: bold;">Data_rezerwacji: {{$reservationsdestroy['start']}} -  {{$reservationsdestroy['end']}}</h3>

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent