<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\UserInfoController;


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


Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/role', [RoleController::class, 'createRole']);

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
    Route::post('/{route}', [GatewayController::class, 'proxy']);
    Route::get('/userinfo', [UserInfoController::class, 'getInfo'])
});

