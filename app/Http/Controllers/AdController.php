<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    public function index(){
        return view('add_ads');
    }
    public function createNewItem(){
        return view('add_ad_new_item');
    }

    public function showAllAds(){
        $all_ads = Ad::getAllAd();
        return view("all_ads",compact("all_ads"));
    }

    public function showAd(Request $request, $ad_id)
    {
        $ad = Ad::getAdInfo($ad_id);
        return view("ad",compact("ad"));
    }
}
