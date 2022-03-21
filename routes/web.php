<?php

use App\Http\Controllers\Auth\Features\AdminAdoption;
use App\Http\Controllers\Auth\Features\AdoptionController;
use App\Http\Controllers\Auth\Features\CharityController;
use App\Http\Controllers\Auth\Features\DashboardController;
use App\Http\Controllers\Auth\Features\VisitationController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/adoption', AdminAdoption::class);
Route::resource('/visitation', VisitationController::class);
Route::resource('/charity', CharityController::class);
