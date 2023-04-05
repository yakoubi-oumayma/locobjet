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
    public static function getItemsByUserId($user_id)
    {
        $all_items = DB::select("SELECT *,items.name as item_name,categories.name as category_name FROM items,categories WHERE user_id = ? AND items.category_id=categories.category_id",[$user_id]);
        return $all_items;
    }

/*
    public function save()
    {
        $db = new Database();
        $db->query("INSERT INTO items (name, price, description, image, category, user_id) VALUES (:name, :price, :description, :image, :category, :user_id)");
        $db->bind(':name', $this->name);
        $db->bind(':price', $this->price);
        $db->bind(':description', $this->description);
        $db->bind(':image', $this->image);
        $db->bind(':category', $this->category_id);
        $db->bind(':user_id', $this->user_id);
        $db->execute();
    }
*/
}
