<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

Route::post('/richiesta', function (Request $request) {
    return view('prova', ['name'=> $request->name]);
});

Route::post('/richiestacontr', [Controller::class, 'saluta']);


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

Route::get('/user/{id}', function (string $id) {
    return 'Hello, your user id is '.$id;
});

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
   echo "L'id del post è $postId e l'id del commento è $commentId ";
});