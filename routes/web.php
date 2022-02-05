<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiObjectController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TeamController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::get('objects',[AdminController::class,'objects'])->name('admin.objects');
    Route::get('listusers',[AdminController::class,'listusers'])->name('admin.listusers');
    Route::get('raports',[AdminController::class,'raports'])->name('admin.raports');
    Route::get('allreservations',[AdminController::class,'allreservations'])->name('admin.allreservations');
    Route::get('objects/create',[AdminController::class,'createobject'])->name('admin.createobject');
    Route::get('objects/{post}',[AdminController::class,'objectshow'])->name('admin.objectshow');
    Route::get('objectlight/{post}',[AdminController::class,'objectlight'])->name('admin.objectlight');
    Route::get('objects/{post}/edit',[AdminController::class,'objectsedit'])->name('admin.objectsedit');
    Route::post('storeobject',[AdminController::class,'storeobject'])->name('storeobject');
    Route::post('lightobject',[AdminController::class,'lightobject'])->name('lightobject');
    Route::post('lightobjectoff',[AdminController::class,'lightobjectoff'])->name('lightobjectoff');
    Route::put('objectsupdate/{post}',[AdminController::class,'objectsupdate'])->name('objectsupdate');
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
    Route::get('messages',[AdminController::class,'messages'])->name('admin.messages');
    Route::get('message/{id}',[AdminController::class,'getMessage'])->name('admin.message');
    Route::post('message',[AdminController::class,'postMessage']);
    Route::delete('objects/{post}',[AdminController::class,'objectsdestroy'])->name('objectsdestroy');
    Route::post('allreservations/{id}',[AdminController::class,'reservationsupdatestat'])->name('reservationsupdatestat');
    Route::delete('allreservations/{id}',[AdminController::class,'reservationsdestroy'])->name('reservationsdestroy');
    Route::get('games',[GameController::class,'allgames'])->name('admin.games'); 
    Route::delete('games/{post}',[GameController::class,'admingamesdestroy'])->name('admingamesdestroy');
    Route::get('games/{post}',[GameController::class,'admingameshow'])->name('admin.gameshow');
    Route::get('addreservations',[AdminController::class,'addreservations'])->name('admin.addreservations');
    Route::get('reservations/{id}',[AdminController::class,'getReservationObject'])->name('admin.reservations');
    Route::post('storebook/{id}',[AdminController::class,'storebookAdmin'])->name('storebookAdmin');
    Route::get('reservationEvents/{id}',[AdminController::class,'reservationEventsAdmin'])->name('reservationEventsAdmin');
    Route::get('dashboard',[StatisticController::class,'reservationsAllCount'])->name('admin.dashboard');
    Route::post('mark-as-read/{id}', [AdminController::class,'markNotification'])->name('markNotification');
    Route::post('markall-as-read', [AdminController::class,'markAllNotification'])->name('markAllNotification');
    Route::get('allreservations/search', [SearchController::class,'indexsearch'])->name('admin.searchreser');
    Route::get('listusers',[ListUserController::class,'listuser'])->name('admin.listusers');
    Route::delete('listusers/{id}',[ListUserController::class,'usersdestroy'])->name('usersdestroy');
    Route::get('objectraports',[PDFController::class,'objectraports'])->name('admin.raports');
    Route::get('generate-daypdf/{id}',[PDFController::class,'generateDaypdf'])->name('admin.daypdf');
    Route::get('generate-allpdf/{id}',[PDFController::class,'generateAllpdf'])->name('admin.alldaypdf');
    Route::get('teams',[TeamController::class,'allAdminTeams'])->name('admin.teams');
    Route::delete('teams/{post}',[TeamController::class,'adminteamsdestroy'])->name('adminteamsdestroy');
    Route::get('flashscore',[TeamController::class,'flashscoreadmin'])->name('admin.flashscore');
    Route::put('flashscore/{id}',[TeamController::class,'flashscoreadminupdate'])->name('flashscoreadminupdate');
});


Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('objects',[UserController::class,'objects'])->name('user.objects');
    Route::get('dashboard',[UserController::class,'objectsindex'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('flashscore',[TeamController::class,'flashscore'])->name('user.flashscore');
    Route::get('myreservations',[ReservationController::class,'myreservations'])->name('user.myreservations');
    Route::get('myreservationsedit/{post}',[ReservationController::class,'myreservationsedit'])->name('myreservationsedit');;
    Route::put('myreservationsupdate/{post}',[ReservationController::class,'myreservationsupdate'])->name('myreservationsupdate');
    Route::get('messages',[UserController::class,'messages'])->name('user.messages');
    Route::get('message/{id}',[UserController::class,'getMessage'])->name('user.message');
    Route::post('message',[UserController::class,'postMessage']);
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
    Route::get('object/{id}',[UserController::class,'getObject'])->name('user.object');
    Route::get('reservationobject/{id}',[ReservationController::class,'getReservationObject'])->name('user.reservationobject');
    Route::post('storebook/{id}',[ReservationController::class,'storebook'])->name('storebook');
    Route::get('reservationEvents/{id}',[ReservationController::class,'reservationEvents'])->name('reservationEvents');
    Route::delete('myreservations/{post}',[ReservationController::class,'myreservationsdestroy'])->name('myreservationsdestroy');
    Route::get('games',[GameController::class,'games'])->name('user.games');
    Route::get('create/team',[UserController::class,'createteam'])->name('user.createteam');
    Route::get('game/{id}',[GameController::class,'getGame'])->name('user.game');
    Route::post('allreservations','ColumnSearchController@index');
    Route::get('games/create',[GameController::class,'creategame'])->name('user.makegame');
    Route::post('storegame',[GameController::class,'storegame'])->name('storegame');
    Route::post('storeteam',[TeamController::class,'storeteam'])->name('storeteam');
    Route::post('jointeam/{id}',[TeamController::class,'jointeam'])->name('jointeam');
    Route::post('joingame/{id}',[GameController::class,'joingame'])->name('joingame');
    Route::post('jointeamplayer/{id}',[TeamController::class,'jointeamplayer'])->name('jointeamplayer');
    Route::post('invatieteam/{id}',[TeamController::class,'invatieteam'])->name('invatieteam');
    Route::post('joingameplayer/{id}',[GameController::class,'joingameplayer'])->name('joingameplayer');
    Route::get('showyourgame',[GameController::class,'showyourgame'])->name('user.showyourgame');
    Route::delete('showyourgame/{post}',[GameController::class,'showyourgamedestroy'])->name('showyourgamedestroy');
    Route::get('objects/search', [SearchController::class,'objectsearch'])->name('user.objectsearch');
    Route::get('addreservations',[ReservationController::class,'addreservations'])->name('user.addreservations');
    Route::get('allteams',[TeamController::class,'allteams'])->name('user.showteams');
    Route::get('teaminfo/{post}',[TeamController::class,'teamdetail'])->name('user.teamdetail');
    Route::get('game',[TeamController::class,'teamsModal'])->name('user.game');
    Route::get('yoursteam',[TeamController::class,'yoursteam'])->name('user.yoursteam');
    Route::get('yourteaminfo/{post}',[TeamController::class,'yourteamdetail'])->name('user.yourteamdetail');
    Route::post('yourteaminfo/{id}',[TeamController::class,'gamesupdatestat'])->name('gamesupdatestat');
    Route::delete('yourteaminfo/{id}',[TeamController::class,'teamgamesdestroy'])->name('teamgamesdestroy');
    Route::get('playgame/{id}',[TeamController::class,'viewPlayGame'])->name('user.playgame');
    Route::post('playgame',[TeamController::class,'startPlayGame'])->name('startPlayGame');
    Route::post('playgame/{id}',[TeamController::class,'updatePlayGame'])->name('updatePlayGame');
    Route::post('playgame/{id}/score',[TeamController::class,'updateScorePlayGame'])->name('updateScorePlayGame');
    Route::delete('yoursteam/{id}',[TeamController::class,'disjointeam'])->name('disjointeam');
    Route::delete('teaminfo/{id}',[TeamController::class,'teamuserdestroy'])->name('teamuserdestroy');
    
});

Route::get('test', function () {
    event(new App\Events\StatusNotification('Someone'));
    return "Event has been sent!";
});
Route::get('countnreadmessages',[MessagesController::class,'countnreadmessages'])->name('countnreadmessages');

Route::get('/api/map-marker', 'Api\ApiObjectController@mapMarker');
Route::get('/api/map-marker',[ApiObjectController::class,'mapMarker']);