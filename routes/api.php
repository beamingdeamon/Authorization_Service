<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidateController;

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

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('/user', [UserController::class, 'getUsers']);
    Route::get('/user/{id}', [UserController::class, 'getUserInfo']);
    Route::put('/user/{id}', [UserController::class, 'changeUser']);
    Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
    Route::post('/{route}', [GatewayController::class, 'proxy']);
});

