<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


//public
Route::get('/users',[UserController::class,'getAlluser']);
Route::post('/signup', [UserController::class, 'create']);  //register, create new account
Route::get('/users/{id}',[UserController::class,'show']);

//private Route
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/signin', [UserController::class, 'signin']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});
