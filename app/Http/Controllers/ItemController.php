<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // list all items
    public static function listItems()
    {
        $items_infos = Items::getItemsByUserId(1);
        $items = $items_infos["all_items"];
        $item_images = $items_infos["item_images"];
        $categories = Items::getCategories();
        return view('all_items', ['items' => $items, "item_images" => $item_images, 'categories' => $categories]);
    }

    public function editItem(Request  $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $city = $request->input('city');
        $description = $request->input('description');
        $user_id = 1;
        $category_id = $request->input('category_id');
        $item_id = $request->input('item_id');

        Item::editItem($name, $price, $city, $description, $user_id , $category_id, $item_id);
        return ItemController::listItems();
    }
}

