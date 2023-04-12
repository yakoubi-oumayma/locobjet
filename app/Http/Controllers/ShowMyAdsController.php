<?php

namespace App\Http\Controllers;

use App\Models\MyAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMyAdsController extends Controller
{
    public function ShowMyAds(){

        $user_id = 3; // votre variable contenant l'ID de l'utilisateur

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
                        $MyAds = DB::table('ads')
                        ->join('items', 'ads.item_id', '=', 'items.item_id')
                        ->leftJoin('ads_availab', function ($join) {
                            $join->on('ads.ad_id', '=', 'ads_availab.ad_id')
                                 ->where(function ($query) {
                                    $query->where('ads.availability', '=', 'limited');
                                 });
                        })
                        ->select('ads.*', 'items.*', 'ads_availab.day', 'ads_availab.month')
                        ->where('ads.item_id', '=', $item->item_id)
                        ->get();
            
                    //$MyAds = DB::select('SELECT ads.*, items.*, ads_availab.day, ads_availab.month
                    //FROM ads
                    //JOIN items ON ads.item_id = items.item_id
                    //LEFT JOIN ads_availab ON ads.ad_id = ads_availab.ad_id
                    //WHERE ads.item_id = ? ', [$item->item_id]);

                    
                    return view('ads.ShowMyAds', compact("MyAds"));    
                }
            }
        }}}