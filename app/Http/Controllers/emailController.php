<?php

namespace App\Http\Controllers;

use App\Mail\ClientMail;
use App\Mail\RefuseClientMail;
use App\Mail\OwnerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class emailController extends Controller
{

    public function sendWelcomeEmail(Request $request)
    {

        $user_id = $request->input('user_id');
        $username = $request->input('username');
        $emailClient = $request->input('email');
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $object_name = $request->input('object_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $price = $request->input('price');

        // Send email to client
        $clientData = [
            'name' => $f_name . ' ' . $l_name,
            'object_name' => $object_name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price' => $price,
            'email' => $emailClient
        ];


        // Send email to owner
        $owner = new User();
        $owner_info = $owner::selectUser();
        $emailOwner = $owner_info[0]->email;
        $ownerData = [
            'client_name' => $f_name . ' ' . $l_name,
            'name' => $owner_info[0]->f_name . ' ' . $owner_info[0]->l_name,
            'object_name' => $object_name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price' => $price,
            'email' => $emailOwner
        ];
        if ($request->has('accept')) {
            Mail::to($emailOwner)->send(new OwnerMail($clientData));
            Mail::to($emailClient)->send(new ClientMail($ownerData));
        } else if ($request->has('refuse')) {


            Mail::to($emailClient)->send(new RefuseClientMail($ownerData));
        }

        return response()->json(['message' => 'Email sent successfully']);
    }
}
