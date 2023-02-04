<?php

use App\Http\Controllers\rfidAPI;
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


Route::post("/rfid-check", [RfidController::class, 'checkUser']);
Route::delete("/delete-user/{id}", [UserController::class, 'deleteUser']);