<?php

namespace App\Http\Controllers;

use App\Models\Mylocations;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MylocationsController
{
    public function index(){
        return view('my_location');
    }




    public function ShowMylocations(){
        $user_id = 3; // votre variable contenant l'ID de l'utilisateur
        $all_ads=Mylocations::getMylocations(Auth::user()->user_id);
        $dt = Carbon::now();
        $dt->toDateString();
        return view('my_locations', compact("all_ads","dt"));


    }
    public static function getcommentadded($user_id,$reservation_id){
        $comment_exist = DB::select("Select count(*) FROM user_reviews WHERE user_reviews.user_id=? and user_reviews.reservation_id=?",[$user_id,$reservation_id]);
        return $comment_exist;
    }

    public function addCom(Request $request){
        $client = $request->submit;
        $reservation_id=$request->reservation_id;
        $comment=$request->comment;
        $rating=$request->rating;
        DB::insert('INSERT INTO user_reviews (from_user_id, to_user_id, comment, rating,reservation_id) VALUES (?,?,?,?,?)', [Auth::user()->user_id, $client, $comment, $rating,$reservation_id]);
        $all_ads=Mylocations::getMylocations(Auth::user()->user_id);
        $dt = Carbon::now();
        $dt->toDateString();
        return redirect()->back();
    }
}
