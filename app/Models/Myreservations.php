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

    public static function getRequestedReservationByUserId(int $id): array
    {
        return DB::select("SELECT  *,title, description, reservation.user_id as client, end_date, username
                         from ads,items,reservation,users
                         WHERE items.user_id=:id and users.user_id=reservation.user_id
                         AND ads.ad_id=reservation.ad_id and ads.item_id=items.item_id
                         and  reservation.state = 'requested'", [$id]);
    }
}
