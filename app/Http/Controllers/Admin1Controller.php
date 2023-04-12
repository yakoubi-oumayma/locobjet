<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin1;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
class Admin1Controller extends Controller
{
    public function DeleteAd(){
       
        
        $annonces=Admin1::inRandomOrder()->get();
        $activeAdsCount = Admin1::where('state', 'active')->count();
        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        $reservedReservCount = Reservation::where('state','reserved')->count();
        //return view('admin.DeleteUser',compact("utilisateurs"));
  
        return view('admin.DeleteAd', ['annonces' => $annonces, 'activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount, 'reservedReservCount' => $reservedReservCount]);
    
    }
    public function delete(Admin1 $annonce){
        $annonce->delete();
        return back()->with("succesDelete", "Annonce supprime avec succes!");
    }
    
}



