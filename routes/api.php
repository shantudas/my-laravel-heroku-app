<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Welcome to article api', 200)
        ->header('Content-Type', 'text/plain');
});


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::apiResource('locations', 'LocationController');
Route::post('store-locations', 'LocationController@storeLocations');




// Route::group([

// ], function () {

//     Route::post('login', 'AuthController@login');
//     Route::post('register', 'AuthController@register');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');


//     Route::post('articles', 'ArticleController@index');
//     Route::post('articles/{article_id}', 'ArticleController@show');
//     Route::post('article/store', 'ArticleController@store');

   


// });
