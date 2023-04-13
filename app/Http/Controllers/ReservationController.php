<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin1;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
class ReservationController extends Controller
{
    public function ShowReserv(){


        $reservations=Reservation::inRandomOrder()->get();
        $activeAdsCount = Admin1::where('state', 'active')->count();
        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        $reservedReservCount = Reservation::where('state','reserved')->count();
        //return view('admin.DeleteUser',compact("utilisateurs"));

        return view('admin.ShowReserv', ['reservations' => $reservations, 'activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount, 'reservedReservCount' => $reservedReservCount]);

    }
}
