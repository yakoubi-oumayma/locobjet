<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'rating', 'comment', 'from_user_id', 'to_user_id'];
    protected $table = 'user_reviews';


    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
