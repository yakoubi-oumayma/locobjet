<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin1;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\type;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function AddType(){
        $types =  type::inRandomOrder()->get();
        $activeAdsCount = Admin1::where('state', 'active')->count();
        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        $reservedReservCount = Reservation::where('state','accepted')->count();
        //return view('admin.DeleteUser',compact("utilisateurs"));
        return view('admin.AddType', ['types' => $types, 'activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount, 'reservedReservCount' => $reservedReservCount ]);
    }

    public function create(){

        return view("admin.createCategory", );
    }
    public function store(Request $request){

        $request->validate([
            "name"=>"required"]);

        Category::create([
            "name"=>$request->name,
        ]);
        return back()->with("success", "Categorie ajoutee avec succes!");
    }
}
