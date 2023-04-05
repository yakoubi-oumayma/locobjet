<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'f_name',
        'l_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function receivedReviews()
    {
        return $this->hasMany(UserReview::class, 'to_user_id');
    }

    public static function selectUser()
    {
        $user_id =  1;
        $user = DB::select("SELECT * FROM users WHERE user_id=?",[$user_id]);
        return $user[0];
    }

    public static function getUserId()
    {
        $email =  session('email');
        $user_id = User::where('email', $email)->pluck('id');
        return $user_id;
    }

    public function updateFields(array $fields)
    {

        $data = [];
        if (!empty($fields['f_name'])) {
            $data['f_name'] = $fields['f_name'];
        }
        if (!empty($fields['l_name'])) {
            $data['l_name'] = $fields['l_name'];
        }
        if (!empty($fields['username'])) {
            $data['username'] = $fields['username'];
        }
        if (!empty($fields['email'])) {
            $data['email'] = $fields['email'];
            session()->put('email',  $data['email']);
        }
        /*if (!empty($fields['password'])) {
            $data['password'] = Hash::make($fields['password']);
        }*/
        $this->update($data);
    }
}
