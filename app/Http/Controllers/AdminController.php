<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Admin1;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function DeleteUser(){

        //$utilisateurs=Admin::orderBy("username","asc")->get();
        $utilisateurs=Admin::inRandomOrder()->get();
        $activeAdsCount = Admin1::where('state', 'active')->count();
        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        $reservedReservCount = Reservation::where('state','reserved')->count();
        //return view('admin.DeleteUser',compact("utilisateurs"));
        return view('admin.DeleteUser', ['utilisateurs' => $utilisateurs, 'activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount, 'reservedReservCount' => $reservedReservCount ]);

    }
    public function delete(Admin $utilisateur){
        $utilisateur->delete();
        return back()->with("succesDelete", "User supprime avec succes!");
    }


}
