<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';

    
    public function Annonces(){
        return $this->belongsTo(Admin1::class, 'ad_id');
    }
    public function utilisateurs(){
        return $this->belongsTo(Admin::class, 'user_id');
    }
}

