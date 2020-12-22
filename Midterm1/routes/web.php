<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpController;
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
    return redirect('/employees');
});

Route::get('/employees', [EmpController::class, 'index'])->name("employee.index")->middleware('auth');

Route::get('/employees/{employee}/edit', [EmpController::class, 'edit'])->name("employee.edit")->middleware('auth');
Route::put('/employees/{employee}/update', [EmpController::class, 'update'])->name("employee.update")->middleware('auth');
Route::put('/employees/{employee}/hire', [EmpController::class, 'hire'])->name('hire')->middleware('auth');

Route::get('/users/login', [UserController::class, 'login'])->name('login');
Route::post('/users/answer-login', [UserController::class, 'postLogin'])->name('post_login');
Route::post('/users/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/users/register', [UserController::class, 'register'])->name('register');
Route::post('/users/answer-register', [UserController::class, 'postRegister'])->name('post_register');
