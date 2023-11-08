<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SingleServer;

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
    return view('greeting', ['name' => 'James']);
});

Route::get('/direttive', function () {
    return view('direttive', ['name' => 'James', 'age' => 26, 'mail' => 'xxx@eee.it', 'city' => 'Roma']);
});

Route::get('/task', function () {
    return view('task');
});

Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/report/anagrafiche/{mese}/{year}', function (string $month, string $year) {
    $arrayRotte = ['year' => $year, 'mese' => $month];
    return view('admin.report.report', $arrayRotte);
});



Route::resources([
    'companies' => CompanyCRUDController::class,
    'customers' => CustomerController::class,
    'photos' => PhotoController::class
]);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/', [UserController::class, 'index']);
Route::get('/users/export', [UserController::class, 'exportUserPdf']);

Route::get('/componenti/', function () {
    return view('componenti');
});


Route::get('/server', SingleServer::class);