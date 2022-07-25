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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Autenticacion
Route::post('/login','LoginController@login');
Route::post('/registrar','LoginController@registrar');
Route::middleware('auth:api')->post('/logout','LoginController@logout');
Route::middleware('auth:api')->get('/tokenlogin','LoginController@token');

////preferencias
Route::get('/usuarios','LoginController@getusers');


