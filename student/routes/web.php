<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('students', 'App\Http\Controllers\StudentController');

Route::get('/mostratutti', ['App\Http\Controllers\StudentController', 'showAll'])->name("mostratutti");


Route::get('/mostra/{name}', ['App\Http\Controllers\StudentController', 'showOne']);
Route::get('/mostra/{name}/{pwd}', ['App\Http\Controllers\StudentController', 'showOneName']);
Route::get('/cambiapwd/{name}/{newpwd}', ['App\Http\Controllers\StudentController', 'updatePwd']);


Route::get('/cambiapwdcancella/{name}/{newpwd}/{deletename}', ['App\Http\Controllers\StudentController', 'updateDelete']);

//query builder
Route::get('/mostratuttiqb', ['App\Http\Controllers\StudentController', 'showAllqb']);
Route::get('/mostramail/{name}', ['App\Http\Controllers\StudentController', 'getMail']);
Route::get('/mostramail2/{name}/{pwd}', ['App\Http\Controllers\StudentController', 'getExtraMail']);
