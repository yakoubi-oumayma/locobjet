<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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

    static public function addAd($name, $price, $city, $description, $category_id,
                                 $imagename,
                                 $title, $available_form, $min_rent_period, $availability,
                                 $available_month, $available_days)
    {
        DB::insert('INSERT INTO items (name, price, city, description, category_id, user_id ) VALUES (?,?,?,?,?,?)', [$name, $price, $city, $description, $category_id, 1]);

        $lastId = DB::table('items')->latest('item_id')->first()->item_id;

        foreach ($imagename as $item_images) {
            $filename = time() . '_' . $item_images->getClientOriginalName();
            $item_images->storeAs('public/', $filename);
            DB::insert('INSERT INTO item_images(item_id, imagename ) VALUES (?,?)', [$lastId, $filename]);
        }
        $createdAt = Carbon::now();
        DB::insert('INSERT INTO ads (title, available_from, min_rent_period, availability,createdAt , item_id ) VALUES (?,?,?,?,?,?)', [$title, $available_form, $min_rent_period, $availability, $createdAt, $lastId]);

        $lastAdId = DB::table('ads')->latest('ad_id')->first()->ad_id;

        if ($availability == 'limited') {
            if (in_array(0, $available_days) && in_array(0, $available_month)) {
                DB::update('update ads set availability = ? where ad_id = ?', ['allTime', $lastAdId]);
            } else {
                foreach ($available_month as $month) {
                    foreach ($available_days as $day) {
                        DB::insert('INSERT INTO ads_availability (day, month, ad_id ) VALUES (?,?,?)', [$day, $month, $lastAdId]);
                    }
                }
            }
        }
    }


    static public function addExistenItemAd($item_id, $title, $available_from, $min_rent_period, $availability,
                                            $available_month, $available_days){

        $createdAt = Carbon::now();
        DB::insert('INSERT INTO ads (title, available_from, min_rent_period, availability,createdAt , item_id) VALUES (?,?,?,?,?,?)', [$title, $available_from, $min_rent_period, $availability, $createdAt, $item_id]);

        $lastAdId = DB::table('ads')->latest('ad_id')->first()->ad_id;

        if ($availability == 'limited') {
            if (in_array(0, $available_days) && in_array(0, $available_month)) {
                DB::update('update ads set availability = ? where ad_id = ?', ['allTime', $lastAdId]);
            } else {
                foreach ($available_month as $month) {
                    foreach ($available_days as $day) {
                        DB::insert('INSERT INTO ads_availability (day, month, ad_id ) VALUES (?,?,?)', [$day, $month, $lastAdId]);
                    }
                }
            }
        }
    }

    static public function searchByItemId($itemId){
        $item = DB::select('SELECT  items.*, categories.name as category_name
                     FROM items
                     INNER JOIN categories ON items.category_id = categories.category_id
                     WHERE items.item_id = ?', [$itemId]);

        $item_image= DB::select('SELECT imagename  FROM  item_images  WHERE item_images.item_id = ?', [$itemId]);

        return [$item, $item_image];
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
