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

/*
| Testing routes
*/
Route::get('/test', 'TestController@test')->middleware('jwt.auth:admin');

/*
| Authentication routes
*/
Route::post('/login', 'AuthController@login');

/*
| Admin user routes
*/
Route::prefix('/clients')->middleware('jwt.auth:admin')->group(function () {
    Route::get('/', 'ClientController@list');
    Route::post('/', 'ClientController@create');
    Route::post('/{id}', 'ClientController@update');
    Route::delete('/{id}', 'ClientController@delete');
    Route::get('/export-data', 'ClientController@exportPDF');
});
