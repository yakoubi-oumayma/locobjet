<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = ['ad_id', 'item_id'];
    protected $table = 'ads';
    protected $primaryKey = "ad_id";

    public function adReviews()
    {
        return $this->hasMany(AdReview::class, 'ad_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }





    public static function getAllAd(){
        $all_ads = DB::select("SELECT * FROM ads order by ad_id ASC");
        $ad_images = [];
        foreach ($all_ads as $ad){
            $image_name= DB::select("SELECT imagename FROM item_images WHERE item_id=? LIMIT 1",[$ad->item_id]);
            if (!empty($image_name)){
                $ad_images[$ad->ad_id] = $image_name[0]->imagename;
            }
            else{
                $ad_images[$ad->ad_id] = "";
            }
        }

        return ["all_ads" => $all_ads, "ad_images" => $ad_images];
    }
    public static function getAllAdsByUserId($user_id){
        $all_ads = DB::select("SELECT * FROM ads,items WHERE ads.item_id=items.item_id AND items.user_id=? order by ad_id ASC",[$user_id]);
        $ad_images = [];
        foreach ($all_ads as $ad){
            $image_name= DB::select("SELECT imagename FROM item_images WHERE item_id=? LIMIT 1",[$ad->item_id]);
            if (!empty($image_name)){
                $ad_images[$ad->ad_id] = $image_name[0]->imagename;
            }
            else{
                $ad_images[$ad->ad_id] = "";
            }
        }
        return ["all_ads" => $all_ads, "ad_images" => $ad_images];
    }


    public static function getAdInfo($ad_id){
        $ad = DB::select("SELECT * FROM ads,items WHERE ads.item_id=items.item_id AND ad_id=? LIMIT 1",[$ad_id]);
        $ad_images = DB::select("SELECT imagename FROM item_images WHERE item_id=?",[$ad[0]->item_id]);
        $ad_reviews = DB::select("SELECT * FROM ad_reviews WHERE ad_id=?",[$ad_id]);
        $ad_infos = ["ad_infos" => $ad[0], "ad_images" => $ad_images, "ad_reviews" => $ad_reviews];
        return $ad_infos;
    }

    static public function addAd(
        $name,
        $price,
        $city,
        $description,
        $category_id,
        $imagename,
        $title,
        $available_form,
        $min_rent_period,
        $availability,
        $available_month,
        $available_days
    ) {
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


    static public function addExistenItemAd(
        $item_id,
        $title,
        $available_from,
        $min_rent_period,
        $availability,
        $available_month,
        $available_days
    ) {

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

    static public function searchByItemId($itemId)
    {
        $item = DB::select('SELECT  items.*, categories.name as category_name
                     FROM items
                     INNER JOIN categories ON items.category_id = categories.category_id
                     WHERE items.item_id = ?', [$itemId]);

        $item_image = DB::select('SELECT imagename  FROM  item_images  WHERE item_images.item_id = ?', [$itemId]);

        return [$item, $item_image];
    }
}
