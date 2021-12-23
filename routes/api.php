<?php

use Illuminate\Http\Request;
use App\Http\Middleware\AdminKey;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('login',        'App\Http\Controllers\API\LoginController@login');
Route::post('logout',       'App\Http\Controllers\API\LoginController@logout');

//user module
Route::resource('user',     'App\Http\Controllers\API\UserController');

Route::middleware([AdminKey::class])->group(function(){
    Route::resource('category', 'App\Http\Controllers\API\CatController');
    Route::resource('product',  'App\Http\Controllers\API\ProdController');
});

