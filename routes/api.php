<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\CommentsController;

Route::prefix('v1')->group(function(){
  Route::post('/users/registration', [RegistrationController::class, 'post']);
  Route::post('/users/login', [LoginController::class, 'post']);
  Route::post('/users/logout', [LogoutController::class, 'post']);

  Route::get('/users/{user_id}', [UsersController::class, 'get']);

  Route::get('/shops', [ShopsController::class, 'index']);
  Route::get('/shops/{shop_id}', [ShopsController::class, 'get']);

  Route::get('/likes', [LikesController::class, 'index']);
  Route::put('/shops/{shop_id}/likes', [LikesController::class, 'put']);
  Route::delete('/shops/{shop_id}/likes', [LikesController::class, 'delete']);
  Route::get('/users/{user_id}/likes', [LikesController::class, 'get']);

  Route::post('/shops/{shop_id}/reservations', [ReservationsController::class, 'post']);
  Route::put('/reservations/{id}', [ReservationsController::class, 'put']);
  Route::delete('/shops/{shop_id}/reservations', [ReservationsController::class, 'delete']);
  Route::get('/users/{user_id}/reservations', [ReservationsController::class, 'get']);

  Route::get('/areas', [AreasController::class, 'index']);
  Route::get('/genres', [GenresController::class, 'index']);

  Route::post('/shops/{shop_id}/comments', [CommentsController::class, 'post']);
  Route::put('/comments/{id}', [CommentsController::class, 'put']);
  Route::delete('/comments/{id}', [CommentsController::class, 'delete']);
});

