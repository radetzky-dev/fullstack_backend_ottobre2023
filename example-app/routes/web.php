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

Route::post('/rispondi', function () {
    echo "Richiesta arrivata in POST!<br>";
    var_dump($_POST);
});

Route::any('/tutto', function () {
    echo "Richiesta arrivata in qualsiasi modo!<br>";
    var_dump($_REQUEST);
});