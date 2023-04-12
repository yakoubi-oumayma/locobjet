<?php

use App\Http\Controllers\ShowMyAdsController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ReservationController;
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

Route::get('/ads', [ShowMyAdsController::class,'ShowMyAds']);

//Route::get('/admin', [AdminController::class,'DeleteUser']);



Route::get('/admin', [AdminController::class,'DeleteUser'])->name("users");

Route::delete("/admin/{utilisateur}",[AdminController::class, 'delete'])->name("utilisateur.supprimer");

Route::get('/ads', [Admin1Controller::class, 'DeleteAd'])->name('ads');
//Route::get('/admin1', [Admin1Controller::class,'DeleteAd'])->name("ads");
Route::delete("/admin1/{annonce}",[Admin1Controller::class, 'delete'])->name("annonce.supprimer");

//Route::get('/admin1', [Admin1Controller::class,'DeleteAds'])->name("annonces");

//Route::get('/admin1', [Admin1Controller::class, 'deleteAds'])->name('deleteAds');
//Route::get('/ads', [Admin1Controller::class, 'DeleteAd'])->name('ads');
Route::get('/master', [MasterController::class, 'index'])->name('master.index');
//Route::get('/DeleteAd', [Admin1Controller::class, 'index'])->name('admin1.index');

Route::get('/admin2', [Admin2Controller::class,'DeleteObject'])->name("objects");
Route::delete("/admin2/{objet}",[Admin2Controller::class, 'delete'])->name("objet.supprimer");


Route::get('/type', [TypeController::class,'AddType'])->name("categories");
Route::get('/type/create', [TypeController::class,'create'])->name("categorie.create");
Route::post('/type/create', [TypeController::class,'store'])->name("categorie.ajouter");

Route::get('/reservation', [ReservationController::class, 'ShowReserv'])->name('Reservations');