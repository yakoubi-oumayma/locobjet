<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;



class Myreservations
{
    public static function getMyreservations($user_id)
    {
        $all_ads = DB::select("SELECT title,description,reservation.user_id as client,end_date,username from ads,items,reservation,users WHERE items.user_id=? and users.user_id=reservation.user_id AND ads.ad_id=reservation.ad_id  ",[$user_id]);
        return $all_ads;
    }

    public static function getRequestedReservationByUserId($user_id)
    {
        $reservations = DB::select("SELECT *, username FROM users,ads,items,reservation WHERE reservation.user_id=? AND reservation.ad_id=ads.ad_id AND ads.item_id=items.item_id AND users.user_id=items.user_id",[$user_id]);
        return $reservations;
    }
}
