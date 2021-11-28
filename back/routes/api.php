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
Route::get('/signup', [UserController::class, 'getAlluser']);//register, create new account
Route::post('/signup', [UserController::class, 'signup']);//register, create new account

//private Route
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/signin', [UserController::class, 'signin']);
});
