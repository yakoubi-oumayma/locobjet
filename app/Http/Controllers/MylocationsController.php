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
    public function addCom(Request $request){
        $client = $request->submit;
        $comment=$request->comment;
        $rating=$request->rating;
        $user_id = 2;
        DB::insert('INSERT INTO user_reviews (from_user_id, to_user_id, comment, rating) VALUES (?,?,?,?)', [$user_id, $client, $comment, $rating]);
        $all_ads=Mylocations::getMylocations(2);
        $dt = Carbon::now();
        $dt->toDateString();
        return redirect()->back();
    }
}
