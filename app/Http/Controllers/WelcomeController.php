<?php

namespace App\Http\Controllers;

use App\Models\Ad;

class WelcomeController
{
public function index(){
    $all_categories = Ad::getAllCategories();
    $ads_info = Ad::getAllAd();
    $all_ads = $ads_info["all_ads"];
    $ad_images = $ads_info["ad_images"];
    return view('welcome', compact("all_ads","ad_images","all_categories"));
}
}
