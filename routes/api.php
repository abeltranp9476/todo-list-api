<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'createAccount']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/user/change_password', [UserController::class, 'changePassword']);
Route::middleware('auth:sanctum')->get('/user/{user}', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->delete('/todo/delete', [TodoController::class, 'destroy']);
Route::middleware('auth:sanctum')->put('/todo/do', [TodoController::class, 'markAsDo']);
Route::middleware('auth:sanctum')->resource('/todo', TodoController::class)->except('destroy');
