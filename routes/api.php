<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('api');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']); // ['AuthController@login']
Route::middleware('api')->group(function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']); //'AuthController@logout'
    Route::post('/refresh', [AuthController::class, 'refresh']); // 'AuthController@refresh'
    Route::get('/me', [AuthController::class, 'me']); // 'AuthController@me'
});
