<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Welcome to article api', 200)
        ->header('Content-Type', 'text/plain');
});


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('me', 'AuthController@me');


//online api
Route::group(['prefix'=>'user','as'=>'user.'], function(){
    Route::post('/online', ['as' => 'online', 'uses' => 'OnlineController@updateOnlineState']);
});



Route::apiResource('locations', 'LocationController');
Route::post('store-locations', 'LocationController@storeLocations');

Route::apiResource('articles', 'ArticleController');