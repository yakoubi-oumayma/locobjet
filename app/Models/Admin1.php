<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin1 extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $primaryKey = 'ad_id';
}
