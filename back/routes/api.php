<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
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


//public ===============User Router===========================

Route::get('/users', [UserController::class, 'getAlluser']);
Route::post('/signup', [UserController::class, 'signUp']);
Route::post('/signin', [UserController::class, 'signin']);

//public ==================Categories Router=================

Route::get('/categories', [CategoryController::class, 'getCategory']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'Addcategory']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);

// public ====================Create Event==============================

Route::get('/events', [EventController::class, 'getEvents']);
Route::post('/events', [EventController::class, 'store']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'delete']);

