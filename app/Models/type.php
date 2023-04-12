<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
}
