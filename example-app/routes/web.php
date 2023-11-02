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
    return view('prova', ['name' => $request->name]);
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
    return 'Hello, your user id is ' . $id;
});

Route::get('/users/{name?}', function (?string $name = null) {

    if (is_null($name)) {
        return "Benvenuto sconosciuto!";
    }

    return 'Il tuo nome è ' . $name;
});

Route::get('/username/{name}', function (string $name) {
    return "Il tuo nome è $name";
})->where('name', '[A-Za-z]+');

Route::get('/company/{id}', function (string $id) {
  return "L'id della tua company è $id";
})->where('id', '[0-9]+');

Route::get('/companies/{id}/{name}', function (string $id, string $name) {
    return "L'id della tua company è $id e il suo nome è $name";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


Route::get('/userid/{id}', function (Request $request, $id) {
    echo $request->getBaseUrl();
    dd($request);
});

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    echo "L'id del post è $postId e l'id del commento è $commentId ";
});

Route::get('/user1/{id}/{name}', function (string $id, string $name) {
    return "Id $id e name $name";
})->whereNumber('id')->whereAlpha('name');

Route::get('/user2/{name}', function (string $name) {
    return "Tuo username $name";
})->whereAlphaNumeric('name');

$myArray = ['movie', 'song', 'painting'];
Route::get('/category/{category}', function (string $category) {
    return "Tua categoria $category";
})->whereIn('category', $myArray );

Route::get('/user/profile', function () {
    return "Benvenuto nella tua pagina profilo";
})->name('profile');

Route::get('/user/profile/category/id/budget', function () {
    return "Benvenuto nella tua pagina del budget";
})->name('budget');