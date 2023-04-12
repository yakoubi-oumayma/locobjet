<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_images extends Model
{
    use HasFactory;
    
        protected $table = 'item_images';
        protected $fillable = ['image_name'];
    
}

