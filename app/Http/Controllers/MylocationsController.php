<?php

namespace App\Http\Controllers;

use App\Models\Mylocations;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MylocationsController
{
    public function index(){
        return view('my_location');
    }




    public function ShowMylocations(){
        $user_id = 3; // votre variable contenant l'ID de l'utilisateur
        $all_ads=Mylocations::getMylocations(3);
        $dt = Carbon::now();
        $dt->toDateString();
        return view('my_locations', compact("all_ads","dt"));


    }
    public function addCom(Request $request){
        $client = $request->submit;
        $comment=$request->comment;
        $rating=$request->rating;
        $user_id = 3;
        DB::insert('INSERT INTO user_reviews (from_user_id, to_user_id, comment, rating) VALUES (?,?,?,?)', [$user_id, $client, $comment, $rating]);
        $all_ads=Mylocations::getMylocations(3);
        $dt = Carbon::now();
        $dt->toDateString();
        return view('my_locations', compact("all_ads","dt"));
    }
}
