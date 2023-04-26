<?php

namespace App\Http\Controllers;

use App\Models\Myreservations;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $reservations = Myreservations::getRequestedReservationByUserId(Auth::user()->user_id);
        //        dd($reservations);
//        +"ad_id": 2
//        +"title": "ad 2"
//        +"state": "requested"
//        +"available_from": "2023-04-01"
//        +"min_rent_period": 3
//        +"availability": "allTime"
//        +"createdAt": "2023-04-01"
//        +"item_id": 3
//        +"created_at": null
//        +"updated_at": null
//        +"name": "hanan"
//        +"price": "620.00"
//        +"city": "hamid"
//        +"description": "hamid hamid"
//        +"user_id": 1
//        +"category_id": 1
//        +"start_date": "2023-04-01"
//        +"end_date": "2023-04-08"
//        +"reservation_id": 2
//        +"username": "zaka"
//        +"email": "zaka@gmail.com"
//        +"f_name": "zaka"
//        +"l_name": "ria"
//        +"email_verified_at": null
//        +"password": "qwertyuiop"
//        +"remember_token": null
//        +"client": 1
        return view('reservations',['reservations' => $reservations]);
    }
}
