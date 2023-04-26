<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin2;
use App\Models\Admin1;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
class Admin2Controller extends Controller
{
    public function DeleteObject(){


        $objets=Admin2::inRandomOrder()->get();
        $activeAdsCount = Admin1::where('state', 'active')->count();
        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        $reservedReservCount = Reservation::where('state','accepted')->count();
        return view('admin.DeleteObject', ['objets' =>$objets , 'activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount, 'reservedReservCount' => $reservedReservCount ]);
        //return view('admin.DeleteUser',compact("utilisateurs"));
    }
    public function delete(Admin2 $objet){
        $objet->delete();
        return back()->with("succesDelete", "Objet supprime avec succes!");
    }
}
