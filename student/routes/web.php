<?php

use App\Http\Controllers\ProfessorController;
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

Route::get('/findstudent/{id}', ['App\Http\Controllers\StudentController', 'findById']);
Route::get('/showmails', ['App\Http\Controllers\StudentController', 'showOnlyMails']);
Route::post('/cerca', ['App\Http\Controllers\StudentController', 'cerca']);


//eloquent
Route::get('/creaprofessore', ['App\Http\Controllers\ProfessorController', 'create'])->name("prof.create");
Route::get('/showprofessore', ['App\Http\Controllers\ProfessorController', 'index'])->name("prof.index");
Route::get('/mostraprofessori', ['App\Http\Controllers\ProfessorController', 'show']);
Route::get('/trovaprofessore/{id}', ['App\Http\Controllers\ProfessorController', 'getSingleProf']);

Route::post('/prof/store', ['App\Http\Controllers\ProfessorController', 'store'])->name("prof.store");
Route::delete('/prof/destroy/{id}', ['App\Http\Controllers\ProfessorController', 'destroy'])->name("prof.destroy");

Route::get('/students/store/comment', ['App\Http\Controllers\StudentController', 'store_comment'])->name('storeComment');
Route::get('/show/comment/{id}', ['App\Http\Controllers\StudentController', 'showComments'])->name("comments");


Route::get('/prof/mail', [ProfessorController::class, 'searchMail'])->name('prof.mail');
Route::post('/prof/search', [ProfessorController::class, 'resultMail'])->name('prof.search');