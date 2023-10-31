<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saluti', function () {
    return "Ciao, benvenuto";
});

Route::get('/prova', function () {
    return "<b>Questa è una prova</b>";
});

Route::get('/test', [Controller::class, 'testRoute']);