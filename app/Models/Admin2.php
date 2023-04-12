<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin2 extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function items(){
        return $this->belongsTo(items::class, 'item_id');
    }
}
