<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\CustomerController;

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

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/report/anagrafiche/{year}', function (string $year) {

    return view('admin.report.report', ['year' => $year]);
});

Route::resource('companies', CompanyCRUDController::class);

Route::resource('customers', CustomerController::class);