<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    // list all items
    public function listItems()
    {
        $items = Item::getItemsByUserId(1);
        return view('all_items', ['items' => $items]);
    }
}

