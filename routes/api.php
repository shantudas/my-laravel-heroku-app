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
Route::post('login', 'AuthController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'AuthController@getAuthenticatedUser');
    Route::post('user/online', 'OnlineTrackController@updateOnlineState');
    Route::apiResource('user/locations', 'LocationController');
    Route::post('user/store-locations', 'LocationController@storeLocations');
});


// user apis





Route::apiResource('articles', 'ArticleController');
