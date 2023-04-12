<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyAds extends Model
{
    protected $table = 'ads';
    use HasFactory;

    //public function classe(){
       //return $this->belongsTo(Items::class);
    //}

    public function classe(){
        return $this->belongsTo(Items::class);
     }
}
 