<?php

namespace App\Models;
use DB;
class Mylocations
{
    public static function getMylocations($user_id)
    {
        $all_ads = DB::select("Select *, username, reservation.user_id as client FROM users,ads,items,reservation WHERE reservation.ad_id=ads.ad_id AND ads.item_id=items.item_id AND reservation.user_id=users.user_id AND items.user_id=? AND reservation.state!='requested' ORDER BY reservation_id DESC",[$user_id]);
        return $all_ads;
    }

}
