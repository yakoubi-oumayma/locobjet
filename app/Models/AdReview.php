<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdReview extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'rating', 'comment', 'ad_id', 'user_id', 'created_at'];
    protected $table = 'ad_reviews';
    protected $primaryKey = 'review_id';



    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
