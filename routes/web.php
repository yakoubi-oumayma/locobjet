<?php

use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MyreservationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeController;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ItemController;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
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

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'DeleteUser'])->name("users");

    Route::delete("/{utilisateur}", [AdminController::class, 'delete'])->name("utilisateur.supprimer");

    Route::get('/ads', [Admin1Controller::class, 'DeleteAd'])->name('ads');
    //Route::get('/admin1', [Admin1Controller::class,'DeleteAd'])->name("ads");
    Route::delete("/admin1/{annonce}", [Admin1Controller::class, 'delete'])->name("annonce.supprimer");

    //Route::get('/admin1', [Admin1Controller::class,'DeleteAds'])->name("annonces");

    //Route::get('/admin1', [Admin1Controller::class, 'deleteAds'])->name('deleteAds');
    //Route::get('/ads', [Admin1Controller::class, 'DeleteAd'])->name('ads');
    Route::get('/master', [MasterController::class, 'index'])->name('master.index');
    //Route::get('/DeleteAd', [Admin1Controller::class, 'index'])->name('admin1.index');

    Route::get('/admin2', [Admin2Controller::class, 'DeleteObject'])->name("objects");
    Route::delete("/admin2/{objet}", [Admin2Controller::class, 'delete'])->name("objet.supprimer");


    Route::get('/type', [TypeController::class, 'AddType'])->name("categories");
    Route::get('/type/create', [TypeController::class, 'create'])->name("categorie.create");
    Route::post('/type/create', [TypeController::class, 'store'])->name("categorie.ajouter");

    Route::get('/reservation', [ReservationController::class, 'ShowReserv'])->name('Reservations');
});





Route::get("/add_ads", [AdController::class, "index"])->name("addAd");

Route::get("/add_ad_new_item", [AdController::class, "createNewItem"]);

Route::get("/all-ads", [AdController::class, "showAllAds"])->name("allAds");
Route::get("/all-ads/{cat_ids}/{cities}/{price}", [AdController::class, "showAdsByCategory"])->name("AdsByCategory");

Route::get("/ad/{ad_id}", [AdController::class, "showAd"])->name("showAd");
Route::post("/ad/{ad_id}", [AdController::class, "verifyReservation"]);

Route::get("/ad/{ad_id}/{start_date}/{end_date}", [AdController::class, "storeReservations"]);



Auth::routes();

Route::post("/my_reservation" ,[MyreservationsController::class ,"addCom"]);
Route::get("/my_reservation",[\App\Http\Controllers\MyreservationsController::class,"showMyAdsactive"])->name("myReservations");
Route::get("/reservations",[MyreservationsController::class,"listRequestedReservation"])->name('reservations');
Route::post("/reservations",[MyreservationsController::class,"handleReservation"])->name('handleReservation');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/all_items", [ItemController::class, 'listItems'])->name('allItems');
Route::post("/all_items", [ItemController::class, 'editItem'])->name('editItem');

Route::get("/editAd/{ad_id}",[AdController::class, "editAd"])->name("editAd");
Route::post("/editAd/{ad_id}",[AdController::class, "updateAd"])->name("editAd");
Route::get("/createAd/{item_id}", [AdController::class, 'createAdFromItem'])->name('createAdFromItem');
Route::get("/createAd", [AdController::class, 'createAd'])->name('createAd');
Route::post("/createAd/{itemId}", [AdController::class, "storeExistenItemAd"]);
Route::post("/createAd", [AdController::class, "storeAd"]);






Route::post("/my_reservation", [MyreservationsController::class, "addCom"]);
Route::get("/my_locations", [\App\Http\Controllers\MylocationsController::class, "ShowMylocations"])->name("myLocations");
Route::post("/my_locations", [\App\Http\Controllers\MylocationsController::class, "addCom"]);
//Route::get("/profile",[ProfileController::class,"index"])->name('profile');
Route::get("/my_ads", [AdController::class, "showMyAds"])->name('myAds');

//


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
Route::put('/settings/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.update');
Route::get('/store_email', [App\Http\Controllers\ProfileController::class, 'storeEmail'])->name('storeEmail');

Route::get('/inscription', [App\Http\Controllers\Auth\RegisterController::class, 'index']);
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name("homePage");

//Mail
Route::get('/test', function () {
    return view('email');
});

Route::put('/email', [App\Http\Controllers\emailController::class, 'sendWelcomeEmail'])->name('sentEmail');
