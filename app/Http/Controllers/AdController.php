<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(){
        return view('add_ads');
    }
    public function createNewItem(){
        return view('add_ad_new_item');
    }
}
