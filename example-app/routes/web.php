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

Route::get('/provavista', function () {
    return view('prova', ["name" => "Mario"]);
});


Route::get('/saluti', function () {
    return "Ciao, benvenuto";
});

Route::redirect('/prova', 'saluti');

Route::get('/test', [Controller::class, 'testRoute']);

Route::match(['get', 'post'], '/rispondi', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Richiesta arrivata in POST!<br>";
        var_dump($_POST);
    } else {
        echo "Richiesta arrivata via GET";
    }
});



Route::any('/tutto', function () {
    echo "Richiesta arrivata in qualsiasi modo!<br>";
    var_dump($_REQUEST);
});