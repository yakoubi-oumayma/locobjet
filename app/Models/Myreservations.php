<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;



class Myreservations
{
    public static function getMyreservations($user_id)
    {
        $all_ads = DB::select("Select *, username, reservation.user_id as auth_user FROM users,ads,items,reservation WHERE reservation.ad_id=ads.ad_id AND ads.item_id=items.item_id AND items.user_id=users.user_id AND reservation.user_id=? AND reservation.state!='requested' ORDER BY reservation_id DESC",[$user_id]);
        return $all_ads;
    }

    public static function getRequestedReservationByUserId($user_id)
    {
        $reservations = DB::select("SELECT *, username,reservation.user_id as client FROM users,ads,items,reservation WHERE reservation.ad_id=ads.ad_id AND ads.item_id=items.item_id AND users.user_id=items.user_id AND items.user_id=? AND reservation.state ='requested' ",[$user_id]);
        return $reservations;
    }

    public static function updateReservation (int $reservationId, string $state) {
        DB::update("UPDATE reservation SET state = :state WHERE reservation_id = :reservationId", [
            'state' => $state,
            'reservationId' => $reservationId
        ]);
    }

    public static function deleteReservation (int $reservationId) {
        DB::delete("DELETE FROM reservation WHERE reservation_id = :reservationId", [
            'reservationId' => $reservationId
        ]);
    }
}
