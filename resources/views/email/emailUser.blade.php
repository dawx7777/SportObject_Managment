@component('mail::message')


<h1 style="text-align:center">Tytuł rezerwacji: {{$postreserv['title']}}</h1>
Miejsce:{{$object['name']}}, {{$object['adress']}} {{$object['city']}}
<br>
Kto zarezerwował: {{$email_user}}
<h3>Data_rezerwacji: {{$postreserv['start']}} -  {{$postreserv['end']}}</h3>
<h3 style="font-weight:bold;">Kod rezerwacji: {{$postreserv['code']}}</h3>

@component('mail::button', ['url' => route('admin.allreservations')])
Podejrzyj rezerwacje
@endcomponent

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent
