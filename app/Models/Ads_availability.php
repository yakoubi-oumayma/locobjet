<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads_availability extends Model
{
    use HasFactory;
    protected $table= 'ads_availability';
    protected  $fillable =['day ', 'month', 'ad_id'];
    protected $primaryKey =['day', 'month', 'ad_id' ];

    public function ads()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
