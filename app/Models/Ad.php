<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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




  public static function getAllCategories(){
        $all_categories = DB::select("SELECT * FROM categories");
        return $all_categories;
  }
    public static function getAllAd(){
        $all_ads = DB::select("SELECT * FROM ads,items WHERE ads.item_id=items.item_id order by ad_id ASC");
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

    public static function getAdsByFiltre($cat_ids_str, $cities_str, $price_str){

        $cat_ids = explode(",",$cat_ids_str);
        $cities_arr = explode(",",$cities_str);
        $price_arr = explode(",",$price_str);

        $nb_cat = count($cat_ids);
        $nb_cities = count($cities_arr);
        $nb_price = count($price_arr);

        $categories = "1=1";
        $cities = "1=1";
        $price = "1=1";

        if ($cat_ids_str != "null"){
            $categories = "category_id IN (";
            for ($i=0;$i<$nb_cat;$i++){
                if ($i == $nb_cat - 1){
                    $categories .= $cat_ids[$i].")";
                    break;
                }
                else{
                    $categories .=$cat_ids[$i].",";
                }
            }
        }
        if ($cities_str != "null"){
            $cities = "items.city IN (";
            for ($i=0;$i<$nb_cities;$i++){
                if ($i == $nb_cities - 1){
                    $cities .= "'".$cities_arr[$i]."')";
                    break;
                }
                else{
                    $cities .= "'".$cities_arr[$i]."',";
                }
            }
        }
        if ($price_str != "null" && $nb_price > 0){
            $price = "items.price". " ".$price_arr[0];
        }

        $all_ads = DB::select("SELECT * FROM ads,items WHERE ads.item_id=items.item_id AND $categories AND $cities AND $price order by ad_id ASC");
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
        $ad_images = DB::select("SELECT imagename FROM item_images WHERE item_id=?",[$ad_id]);
        $ad_reviews = DB::select("SELECT * FROM ad_reviews WHERE ad_id=?",[$ad_id]);
        $ad_infos = ["ad_infos" => $ad[0], "ad_images" => $ad_images, "ad_reviews" => $ad_reviews];
        return $ad_infos;
    }

    public static function updateAd($new_infos){
        $update = DB::update("UPDATE ads SET title=?,state=?,min_rent_period=?,available_from=? WHERE ad_id=?",
            [$new_infos["title"],$new_infos["state"],$new_infos["min_rent_period"],$new_infos["available_from"],$new_infos["ad_id"]]);

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
        $available_end,
        $min_rent_period,
        $availability,
        $available_month,
        $available_days
    ) {

        DB::insert('INSERT INTO items (name, price, city, description, category_id, user_id ) VALUES (?,?,?,?,?,?)', [$name, $price, $city, $description, $category_id, Auth::user()->user_id]);


        $numberOfAds= DB::select('SELECT COUNT(*) AS total_ads FROM ads
                          INNER JOIN items ON ads.item_id = items.item_id
                          WHERE items.user_id =?
                          AND ads.state="active" ' , [1]);
        if ($numberOfAds[0]->total_ads <5){
            DB::insert('INSERT INTO items (name, price, city, description, category_id, user_id ) VALUES (?,?,?,?,?,?)', [$name, $price, $city, $description, $category_id, 1]);

            $lastId = DB::table('items')->latest('item_id')->first()->item_id;

            foreach ($imagename as $item_images) {
                $filename = time() . '_' . $item_images->getClientOriginalName();
                $item_images->storeAs('public/', $filename);
                DB::insert('INSERT INTO item_images(item_id, imagename ) VALUES (?,?)', [$lastId, $filename]);
            }
            $createdAt = Carbon::now();
            DB::insert('INSERT INTO ads (title, available_from, available_end, min_rent_period, availability,createdAt , item_id ) VALUES (?,?,?,?,?,?,?)', [$title, $available_form, $available_end, $min_rent_period, $availability, $createdAt, $lastId]);

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
            return 1;
        }
        else {
          return 0;
        }


    }


    static public function addExistenItemAd(
        $item_id,
        $title,
        $available_from,
        $available_end,
        $min_rent_period,
        $availability,
        $available_month,
        $available_days
    ) {
        $numberOfAds= DB::select('SELECT COUNT(*) AS total_ads FROM ads
                          INNER JOIN items ON ads.item_id = items.item_id
                          WHERE items.user_id =?
                          AND ads.state="active" ' , [1]);
        if ($numberOfAds[0]->total_ads <5) {
            $createdAt = Carbon::now();
            DB::insert('INSERT INTO ads (title, available_from, available_end, min_rent_period, availability,createdAt , item_id) VALUES (?,?,?,?,?,?,?)', [$title, $available_from, $available_end, $min_rent_period, $availability, $createdAt, $item_id]);

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
            return 1;
        }
        else
            return 0;
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
