<?php

namespace App\Models;
use DB;
class Mylocations
{
    public static function getMylocations($user_id)
    {
        $all_ads = DB::select("SELECT title,description,reservation.user_id as client,end_date,username from ads,items,reservation,users WHERE items.user_id=? and users.user_id=reservation.user_id AND ads.ad_id=reservation.ad_id  ",[$user_id]);
        return $all_ads;
    }

}
