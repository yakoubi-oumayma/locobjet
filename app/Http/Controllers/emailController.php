<?php

namespace App\Http\Controllers;

use App\Mail\welcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class emailController extends Controller
{
    public function sendWelcomeEmail(Request $request)
    {

        $content = $request->input('content');
        //$recipient = $request->input('destinataire');
        $user_id = $request->input('user_id');



        $user = new User();
        $user_infos = $user::selectUserInfo($user_id);
        $recipient = $user_infos[0]->email;


        $mail = new welcomeMail($content);
        Mail::to($recipient)->send($mail);

        return response()->json(['message' => 'Email sent successfully']);
    }
}
