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

        $user_id = 1; // votre variable contenant l'ID de l'utilisateur

        $all_ads = DB::select("SELECT * from ads,items WHERE items.user_id=? AND ads.item_id=items.item_id",[$user_id]);

        /*
        // Vérifier si l'utilisateur existe dans la table "users"
        // $user = \App\Models\Users::find($user_id, 'user_id');
        //$user = DB::selectOne('SELECT user_id FROM users where user_id =  $user_id ');
        $user = DB::selectOne('SELECT user_id FROM users where user_id = ?', [$user_id]);

        //DB::select('SELECT  FROM ads,items where ads.ad_id=items.ad_id');
        if ($user) {
            // Récupérer l'item associé à l'utilisateur dans la table "items"
            //$item = $user->item;
            $item = DB::selectOne('SELECT item_id FROM items where user_id =?', [$user_id]);
            if ($item) {
                // Vérifier si l'item existe dans la table "ads"
                // $ad = \App\Models\MyAds::where('item_id', $item->id)->first();
                //$ad = DB::select('SELECT item_id FROM ads where ads.ad_id= $item');
                $ad = DB::select("SELECT item_id FROM ads where ads.ad_id = " . $item->item_id);

                if ($ad) {
                    // Utiliser une jointure entre les tables "ads" et "items" pour récupérer les données
                    //$MyAds = DB::select('SELECT ads.*, items.*
                    //   FROM ads
                    // JOIN items ON ads.item_id = items.item_id
                    //WHERE ads.item_id = ?', [$item->item_id]);
                    $all_ads = DB::table('ads')
                        ->join('items', 'ads.item_id', '=', 'items.item_id')
                        ->leftJoin('ads_availability', function ($join) {
                            $join->on('ads.ad_id', '=', 'ads_availability.ad_id')
                                ->where(function ($query) {
                                    $query->where('ads.availability', '=', 'limited');
                                });
                        })
                        ->select('ads.*', 'items.*', 'ads_availability.day', 'ads_availability.month')
                        ->where('ads.item_id', '=', $item->item_id)
                        ->get();

                    //$MyAds = DB::select('SELECT ads.*, items.*, ads_availab.day, ads_availab.month
                    //FROM ads
                    //JOIN items ON ads.item_id = items.item_id
                    //LEFT JOIN ads_availab ON ads.ad_id = ads_availab.ad_id
                    //WHERE ads.item_id = ? ', [$item->item_id]);


                }
            }
        }
        */
        return view('my_ads', compact("all_ads"));

        }

}
