<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', [\App\Http\Controllers\EmpController::class, 'index'])->name("employee.index");

Route::get('/employees/{employee}/edit', [\App\Http\Controllers\EmpController::class, 'edit'])->name("employee.edit");
Route::put('/employees/{employee}/update', [\App\Http\Controllers\EmpController::class, 'update'])->name("employee.update");
