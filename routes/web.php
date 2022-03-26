<?php

use App\Http\Controllers\Auth\EditProfileController;
use App\Http\Controllers\Auth\Features\AdminAdoption;
use App\Http\Controllers\Auth\Features\CharityController;
use App\Http\Controllers\Auth\Features\DashboardController;
use App\Http\Controllers\Auth\Features\DonationController;
use App\Http\Controllers\Auth\Features\VisitationController;
use App\Http\Controllers\Auth\Features\VolunteerController;
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
Route::get('/adoption/{id}/schedule', [AdminAdoption::class, 'schedule']);
Route::get('/adoption/{id}/schedule/success', [AdminAdoption::class, 'success']);
Route::post('/adoption/{id}/adopted/success', [AdminAdoption::class, 'adopted']);
Route::post('/adoption/{id}/adopted/cancel', [AdminAdoption::class, 'cancelAdoption']);
Route::post('/adoption/{id}/adopted/archive', [AdminAdoption::class, 'archivePet']);
Route::resource('/charity', CharityController::class);
Route::resource('/volunteer', VolunteerController::class);
Route::resource('/donate', DonationController::class);
Route::get('/donate/view/{id}', [DonationController::class, 'showDonations'])->name('donate.user');
Route::get('/donation/view/all', [DonationController::class, 'showAll'])->name('donate.alldonations');
Route::post('/donation/approve/{id}', [DonationController::class, 'approve'])->name('donate.approve');
Route::post('/donation/disapprove/{id}', [DonationController::class, 'disapprove'])->name('donate.disapprove');
Route::resource('/editprofile', EditProfileController::class);
Route::get('/visitation/success', [VisitationController::class, 'successVisit']);
Route::get('/visitation/all', [VisitationController::class, 'allVisits'])->name('visitation.all');


//visiting
Route::post('/addvisit', [AdminAdoption::class, 'saveDate']);
Route::get('/getuservisit', [AdminAdoption::class, 'getAllVisits']);
Route::post('/deletevisit', [AdminAdoption::class, 'deleteVisit']);

//adding volunteers schedule
Route::post('/addvolunteer', [VolunteerController::class, 'addVolunteer']);

Route::resource('/visitation', VisitationController::class);

Route::post('/visitation/addvisit', [VisitationController::class, 'addVisit']);
Route::post('/visitation/approve/{id}', [VisitationController::class, 'approveVisit'])->name('visitation.approve');
Route::post('/visitation/disapprove/{id}', [VisitationController::class, 'disapproveVisit'])->name('visitation.disapprove');
//Route::get('/visitation/success', [VisitationController::class, 'successVisit']);
//Route::view('/visitation/testing', 'volunteer.index');
//('/visitation/successful', [VisitationController::class, 'successVisit']);

Route::get('/volunteers/all', [VolunteerController::class, 'allVolunteers'])->name('volunteers.all');
Route::post('/volunteer/approve/{id}', [VolunteerController::class, 'approveVolunteer'])->name('volunteers.approve');
Route::post('/volunteer/disapprove/{id}', [VolunteerController::class, 'disapproveVolunteer'])->name('volunteers.disapprove');
