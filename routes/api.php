<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/kalenders', 'Api\KalendersController@index');
Route::get('/kalenders/{kalender}', 'Api\KalendersController@show');
Route::get('/kalenders/{kalender}/wedstrijden', 'Api\KalendersController@wedstrijden');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
