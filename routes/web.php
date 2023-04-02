<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/add_ads" ,[AdController::class , "index"]);

Route::get("/add_ad_new_item" ,[AdController::class , "createNewItem"]);
