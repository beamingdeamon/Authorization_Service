<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GatewayController;

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
Route::get('/users', [UserController::class, 'getUserInfo']);

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('/user', [UserController::class, 'getUsers']);
    Route::put('/user/{id}', [UserController::class, 'changeUser']);
    Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
    Route::post('/{route}', [GatewayController::class, 'proxy']);
});

