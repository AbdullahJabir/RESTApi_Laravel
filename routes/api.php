<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('country','Country\CountryController@country');

Route::get('country/{id}','Country\CountryController@countryById');

Route::post('country','Country\CountryController@countrySave');

Route::put('country/{id}','Country\CountryController@countryUpdate');

Route::delete('country/{id}','Country\CountryController@countryDelete');*/

/*Resource controller*/


/*Route::group(['middleware'=>'auth:api'],function(){
	Route::apiResource('country','Country\Country');
});*/


/*Route::apiResource('country','Country\Country');*/

/*for jwt*/

Route::group([

   
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::post('payload', 'AuthController@payload');

    Route::post('register', 'AuthController@register');

});
/*end jwt*/