<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;


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



Route::get('/', [EmployeeController::class, 'getData'])->name("mostraimpiegati");

Route::get('/voli', [FlightController::class, 'getData'])->name("mostravoli");

Route::get('/qb', [EmployeeController::class, 'getDataQb']);

Route::get('/convert-to-json', function () {
    return App\Models\Employee::paginate(5);
});