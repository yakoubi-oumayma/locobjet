<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use Illuminate\Support\Facades\DB;
class MasterController extends Controller
{


    public function index()
    {
        $activeAdsCount = Master::where('state', 'active')->count();

        $usersCount = DB::select('SELECT COUNT(*) AS count FROM users')[0]->count;
        return view('layouts.master', ['activeAdsCount' => $activeAdsCount, 'usersCount' => $usersCount]);
    }
}
