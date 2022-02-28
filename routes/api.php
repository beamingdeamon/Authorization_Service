<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\MailVerificationController;


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
Route::get('/role', [RoleController::class, 'getRoles']);
Route::put('/role/{id}', [RoleController::class, 'changeRole']);
Route::delete('/role/{id}', [RoleController::class, 'deleteRole']);


Route::group(['middleware' => ['jwt.verify']], function(){
    Route::delete('/user', [UserController::class, 'deleteUser']);
    Route::delete('/logout', [TokenController::class, 'deleteToken']);
    Route::get('/user', [UserInfoController::class, 'getInfo']);
    Route::put('/user/edit', [UserInfoController::class, 'changeUserInfo']);
    Route::put('/user/verification', [MailVerificationController::class, 'verifyEmail']);
    
    Route::post('/{route}', [GatewayController::class, 'proxy']);
});

