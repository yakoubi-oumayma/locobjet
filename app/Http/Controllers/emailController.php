<?php

namespace App\Http\Controllers;

use App\Mail\welcomeMail;
use App\Models\Myreservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class emailController extends Controller
{
    /*public function sendWelcomeEmail(Request $request)
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
        $clientContent = "Bonjour " . $f_name . " " . $l_name . ",<br><br> Nous sommes heureux de vous informer que votre offre a été acceptée par le propriétaire pour la location de l'objet suivant: <br><br> Nom de l'objet: " . $object_name . "<br> Date de début: " . $start_date . "<br>Date de fin: " . $end_date . "<br>Prix: " . $price . "<br> Nous vous remercions d'avoir choisi notre service et restons à votre disposition pour toute question ou information supplémentaire.<br><br>Cordialement, <br> L'équipe de LocObjet";
        $clientMail = new welcomeMail($clientContent);
        Mail::to($emailClient)->send($clientMail);

        // Send email to owner
        $owner = new User();
        $owner_info = $owner::selectUser();
        $emailOwner = $owner_info[0]->email;
        $ownerContent = "Bonjour,<br><br>Nous sommes heureux de vous informer que vous avez accepté l'offre de " . $f_name . " " . $l_name . " pour la location de votre objet: <br><br>Nom de l'objet: " . $object_name . "<br>Date de début: " . $start_date . "<br>Date de fin: " . $end_date . "<br>Prix: " . $price . "<br><br>Nous vous remercions d'avoir utilisé notre service et restons à votre disposition pour toute question ou information supplémentaire.<br><br>Cordialement,<br><br>L'équipe de LocObjet";
        $ownerMail = new welcomeMail($ownerContent);
        Mail::to($emailOwner)->send($ownerMail);

        return response()->json(['message' => 'Email sent successfully']);
    }*/

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
        ];
        Mail::to($emailClient)->send(new welcomeMail($clientData));

        // Send email to owner
        $owner = new User();
        $owner_info = $owner::selectUser();
        $emailOwner = $owner_info[0]->email;
        $ownerData = [
            'name' => $owner_info[0]->f_name . ' ' . $owner_info[0]->l_name,
            'object_name' => $object_name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price' => $price,
        ];
        Mail::to($emailOwner)->send(new welcomeMail($ownerData));

        $reservationId = $request->input('reservation_id');
        $state = $request->input('state');
        Myreservations::updateReservation($reservationId, $state);
        return redirect()->route('reservations');
    }
}
