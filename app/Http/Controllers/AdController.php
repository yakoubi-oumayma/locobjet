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
        $ads_info = Ad::getAllAd();
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("all_ads",compact("all_ads","ad_images"));
    }

    public function showAd(Request $request, $ad_id)
    {
        $info = Ad::getAdInfo($ad_id);
        $ad = $info["ad_infos"];
        $ad_images = $info["ad_images"];
        $ad_reviews = $info["ad_reviews"];
        return view("ad",compact("ad","ad_images","ad_reviews"));
    }

    public function createAdFromItem($itemId)
    {
        [$item , $itemImages]=Ad::searchByItemId($itemId);

        return view('create_ad', compact('item' ,'itemImages' ));

    }
    public function createAd()
    {
        return view('create_ad');
    }


    public  function storeAd(Request $request ){
        Ad::addAd($request->name, $request->price, $request->city, $request->description, $request->category_id,
            $request->item_images,
            $request->title, $request->available_from, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);
    }


    // creer une annonce pour un objet deja existant

    public function storeExistenItemAd(Request $request ){

        Ad::addExistenItemAd($request->submit,
            $request->title, $request->available_from, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);
    }

    public function ShowMyAds(){
        $user_id = 1;
        $ads_info = Ad::getAllAdsByUserId($user_id);
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("my_ads",compact("all_ads","ad_images"));
        }

}
