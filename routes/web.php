<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/index', function () {
    return view('index');
});
Route::get('/customers',[CustomerController::class, "index"]);

Route::get('/projects', function () {
    return view('projects');
});
Route::get('/finance', function () {
    return view('finance');
});
Route::get('/offers', function () {
    return view('offers');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
