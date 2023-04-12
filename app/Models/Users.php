<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{ 
   
    protected $table = 'users';
    //$user = \App\Models\Users::find($user_id, 'user_id');

    use HasFactory;
}
