<?php

namespace App\Http\Controllers;

use App\Models\Myreservations;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyreservationsController
{
    public function index()
    {
        return view('my_reservation');
    }

    public function ShowMyAdsactive()
    {

        $user_id = 2; // votre variable contenant l'ID de l'utilisateur

        $all_ads = Myreservations::getMyreservations(2);
        $dt = Carbon::now();
        $dt->toDateString();
        return view('my_reservation', compact("all_ads", "dt"));
    }
    public function addCom(Request $request)
    {
        $ad_id = $request->submit;
        $comment = $request->comment;
        $rating = $request->rating;
        $user_id = 2;
        DB::insert('INSERT INTO ad_reviews (ad_id, user_id, comment, rating) VALUES (?,?,?,?)', [$ad_id, $user_id, $comment, $rating]);
        $all_ads = Myreservations::getMyreservations(2);
        $dt = Carbon::now();
        $dt->toDateString();
        return view('my_reservation', compact("all_ads", "dt"));
    }

    public function listRequestedReservation()
    {
        $reservations = Myreservations::getRequestedReservationByUserId(1);



        return view('reservations', ['reservations' => $reservations]);
    }
}
