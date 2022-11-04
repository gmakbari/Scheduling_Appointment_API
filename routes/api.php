<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentTimeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
	Route::get('times', 'App\Http\Controllers\AppointmentTimeController@index');
	Route::get('time-details/{time_id}', 'App\Http\Controllers\AppointmentTimeController@show');
	Route::post('create-time-block', 'App\Http\Controllers\AppointmentTimeController@store');
	Route::put('update-time/{time_id}', 'App\Http\Controllers\AppointmentTimeController@update');
	Route::delete('delete-time/{time_id}', 'App\Http\Controllers\AppointmentTimeController@destroy');
});