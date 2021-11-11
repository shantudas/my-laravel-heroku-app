<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return response('Welcome to article api', 200)
        ->header('Content-Type', 'text/plain');
});



Route::get('location', 'LocationController@index');
Route::post('location/store', 'LocationController@store');

//Route::apiResource('locations', 'LocationController');





Route::get('/users', function () {
    return \App\User::all();
});


Route::group([

//    'middleware' => 'api',
//    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


    Route::post('articles', 'ArticleController@index');
    Route::post('articles/{article_id}', 'ArticleController@show');
    Route::post('article/store', 'ArticleController@store');

   


});
