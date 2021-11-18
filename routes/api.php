<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Welcome to article api', 200)
        ->header('Content-Type', 'text/plain');
});

// Route::post('register', 'AuthController@register');
// Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout');
// Route::post('refresh', 'AuthController@refresh');
// Route::post('me', 'AuthController@me');




Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::get('user', 'AuthController@getAuthUser');
    Route::get('logout', 'AuthController@logout');
    
    //online,offline
    Route::post('user/online', 'OnlineTrackController@updateOnlineState'); //online,offline state 
    
    //location
    Route::get('user/locations', 'LocationController@index');
    Route::post('user/locations', 'LocationController@store');
    Route::post('user/store-locations', 'LocationController@storeLocations'); //multiple location update
});



//Route::apiResource('user/locations', 'LocationController');




Route::apiResource('articles', 'ArticleController');
