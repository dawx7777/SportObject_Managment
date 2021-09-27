<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiObjectController;
use App\Http\Controllers\Api\ApiRestaurantController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    

    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
    Route::get('messages',[AdminController::class,'messages'])->name('admin.messages');
    Route::get('message/{id}',[AdminController::class,'getMessage'])->name('admin.message');
    Route::post('message',[AdminController::class,'postMessage']);
   
});


Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('objects',[UserController::class,'objects'])->name('user.objects');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('messages',[UserController::class,'messages'])->name('user.messages');
    Route::get('message/{id}',[UserController::class,'getMessage'])->name('user.message');
    Route::post('message',[UserController::class,'postMessage']);
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
    
});

Route::get('/api/map-marker', 'Api\ApiObjectController@mapMarker');
Route::get('/api/map-marker',[ApiObjectController::class,'mapMarker']);