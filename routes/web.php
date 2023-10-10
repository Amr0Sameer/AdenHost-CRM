<?php

use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
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

Route::get('/index',[IndexController::class, 'index']);

Route::get('/projects',[ProjectController::class, "index"]);

Route::get('finance',[FinancesController::class, "index"]);

Route::resource('/leads', LeadsController::class);