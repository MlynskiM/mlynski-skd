<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'show']);
Route::get('/logs', [UserController::class, 'showLogs']);
Route::get('/user/{id}', [UserController::class, 'userInfoShow']);
Route::view('/new-user', 'newUser');

Route::post('/add-user', [UserController::class, 'registerUser']);
Route::get('/edit-user/{id}', [UserController::class, 'editUserView']);
Route::post('/edit-user/{id}', [UserController::class, 'editUser']);
