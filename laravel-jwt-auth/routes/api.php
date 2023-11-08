<?php

use App\Http\Controllers\DataController;
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

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'authenticate'])->name('login');
Route::get('open', [DataController::class, 'open'])->name('open');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', [UserController::class, 'getAuthenticatedUser'])->name('user');
    Route::get('closed', [DataController::class, 'closed'])->name('closed');
});