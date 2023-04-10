<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Item
{
    protected $fillable = ['item_id', 'user_id'];
    protected $primaryKey = 'item_id';
    /*public function __construct($name, $price, $description, $image, $category, $user_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->category_id = $category;
        $this->user_id = $user_id;
    }*/
/*
    public static function getAllItems()
    {
        $db = new Database();
        $db->query("SELECT * FROM items");
        $result = $db->resultSet();
        return $result;
    }

    public static function getItemById($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM items WHERE id = :id");
        $db->bind(':id', $id);
        $result = $db->single();
        return $result;
    }
*/
    public static function getItemsByUserId($user_id): array
    {
        return DB::select("SELECT *, items.name as item_name,
                                        categories.name as category_name, items.category_id as category_id
                                        FROM items,categories
                                        WHERE user_id = ?
                                        AND items.category_id = categories.category_id", [$user_id]);
    }

    public static function editItem($name, $price, $city, $description, $user_id, $category_id, $item_id): void
    {
        DB::update("UPDATE items SET name = ?, price = ?, city = ?, description = ?, user_id = ?, category_id = ?
             WHERE item_id = ?", [$name, $price, $city, $description, $user_id, $category_id, $item_id]);
    }

    public static function getCategories()
    {
        return DB::select("SELECT * FROM categories");
    }

}
