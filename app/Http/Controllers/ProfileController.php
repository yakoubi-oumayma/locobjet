<?php

namespace App\Http\Controllers;

use App\Models\AdReview;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;



class ProfileController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = new User();
            $user_infos = $user::selectUser();
            $email_session = Auth::user()->email;

            $user_id = Auth::user()->user_id;

            $reviews = AdReview::whereHas('ad.item.user', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();

            return view('Profile')->with([
                'user_infos' => $user_infos,
                'reviews'    => $reviews,
                'email_session' => $email_session
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    //VISITER LE PROFIL DUN USER
    public function visitProfil($user_id)
    {

        $user = new User();
        $user_infos = $user::selectUserById($user_id);

        $email_session = Auth::user()->email;



        $reviews = AdReview::whereHas('ad.item.user', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('Profile')->with([
            'user_infos' => $user_infos,
            'reviews'    => $reviews,
            'email_session' => $email_session

        ]);
    }
    public function settings()
    {
        if (Auth::check()) {
            $user = new User();
            $user_Infos = $user::selectUser();

            return view('Settings')->with([
                'user_infos' => $user_Infos
            ]);
        } else {
            return redirect()->route('login');
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
