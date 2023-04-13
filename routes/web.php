<?php

use App\Http\Controllers\MyreservationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ItemController;
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

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

});

Route::get('/', function () {
    return view('welcome');
});

Route::post("/my_reservation" ,[MyreservationsController::class ,"addCom"]);
Route::get("/my_reservation",[\App\Http\Controllers\MyreservationsController::class,"showMyAdsactive"]);

Route::get("/add_ads", [AdController::class, "index"])->name("addAd");

Route::get("/add_ad_new_item", [AdController::class, "createNewItem"]);

Route::get("/all-ads", [AdController::class, "showAllAds"])->name("allAds");
Route::get("/all-ads/{cat_ids}", [AdController::class, "showAdsByCategory"])->name("AdsByCategory");
Route::get("/ad/{ad_id}", [AdController::class, "showAd"])->name("showAd");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/all_items",[ItemController::class,'listItems'])->name('allItems');
Route::post("/all_items",[ItemController::class,'editItem'])->name('editItem');

Route::get("/createAd/{item_id}",[AdController::class,'createAdFromItem'])->name('createAdFromItem');
Route::get("/createAd",[AdController::class,'createAd'])->name('createAd');
Route::post("/createAd/{itemId}" ,[AdController::class , "storeExistenItemAd"]);
Route::post("/createAd" ,[AdController::class , "storeAd"]);






Route::post("/my_reservation" ,[MyreservationsController::class ,"addCom"]);
Route::get("/my_locations",[\App\Http\Controllers\MylocationsController::class,"ShowMylocations"])->name("myLocations");
Route::post("/my_locations" ,[\App\Http\Controllers\MylocationsController::class ,"addCom"]);
//Route::get("/profile",[ProfileController::class,"index"])->name('profile');
Route::get("/my_ads", [AdController::class, "showMyAds"])->name('myAds');

//


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
Route::put('/settings/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.update');
Route::get('/store_email', [App\Http\Controllers\ProfileController::class, 'storeEmail'])->name('storeEmail');

Route::get('/inscription', [App\Http\Controllers\Auth\RegisterController::class, 'index']);
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

