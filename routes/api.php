<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Welcome to article api', 200)
        ->header('Content-Type', 'text/plain');
});


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login')->name('login');
Route::post('me', 'AuthController@me');


// user apis

Route::post('user/info', 'UserController@show');
Route::post('user/online', 'OnlineTrackController@updateOnlineState');
Route::apiResource('user/locations', 'LocationController');
Route::post('user/store-locations', 'LocationController@storeLocations');


Route::apiResource('articles', 'ArticleController');
