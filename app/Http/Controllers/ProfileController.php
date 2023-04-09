<?php

namespace App\Http\Controllers;

use App\Models\AdReview;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;



class ProfileController extends Controller
{

    public function index()
    {
        if (!session()->has('email')) {
            return view('SignIn');
        } else {
            $user = new User();
            $user_infos = $user::selectUser();
            $email_session = session('email');
            //$userId = auth()->user()->id; // Get the ID of the currently logged in user
            $user_id = $user::getUserId();
            /* $reviews = DB::select("SELECT * FROM ad_reviews,ads,items,users WHERE
                        ad_reviews.ad_id=ads.ad_id AND ads.item_id=items.item_id AND items.user_id=users.user_id AND users.user_id=?",[$user_id]);*/
            $reviews = AdReview::whereHas('ad.item.user', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();

            return view('Profile')->with([
                'user_infos' => $user_infos,
                'reviews'    => $reviews,
                'email_session' => $email_session
            ]);
        }
    }

    public function settings()
    {
        if (!session()->has('email')) {
            return view('SignIn');
        } else {
            $user = new User();
            $user_Infos = $user::selectUser();

            return view('Settings')->with([
                'user_infos' => $user_Infos
            ]);
        }
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            "f_name" => "nullable",
            "l_name" => "nullable",
            "username" => "nullable",
            "email" => [
                "nullable",
                "email",
                Rule::unique("users", "email")->ignore($user->user_id, "user_id")
            ],
            "password" => "nullable"
        ]);
        $user->updateFields($request->all());

        return back()->with("success", "Infos ont été bien update!");
    }

    public function storeEmail(Request $request)
    {
        $email = $request->query('email');
        session()->put('email', $email);
        return redirect()->route('profile');
    }
}
