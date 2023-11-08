<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ProjectController;
use App\Models\Pendings;
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

Route::post('/leads/store', [LeadsController::class, 'store']);

Route::get('/leads/show/{id}', [LeadsController::class, 'show']);

Route::resource('/offer', OffersController::class);

Route::post('/offer/store', [OffersController::class, 'store']);

Route::get('/offer/show/{id}', [OffersController::class, 'show']);

Route::get('/offer/edit', [OffersController::class, 'edit']);

Route::resource('/projects', ProjectController::class);

Route::resource('/customers', CustomersController::class);

Route::get('/details', [DetailsController::class, 'index']);

Route::get('/details/show/{id}',[DetailsController::class, 'show']);