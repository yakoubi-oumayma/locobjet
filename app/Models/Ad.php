<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    use HasFactory;

    public static function getAllAd(){
        $all_ads = Ad::orderby("ad_id","asc")->get();
        return $all_ads;
    }

    public static function getAdInfo($ad_id){
        $ad = DB::select("SELECT * FROM ads,items WHERE ads.item_id=items.item_id AND ad_id=? LIMIT 1",[$ad_id]);
        return $ad[0];
    }
}
