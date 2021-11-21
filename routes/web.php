<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('dashboard');
});

Route::resource('dashboard', 'web\DashboardController');
Route::get('users/{userId}/online-track/{date}', [
    'as' => 'onlineTrack.show',
    'uses' => 'web\OnlineTrackController@show'
]);
Route::get('users/online-track/{trackId}',[
    'as' => 'coordinate.show',
    'uses'=>'web\CoordinateController@show'
]);
