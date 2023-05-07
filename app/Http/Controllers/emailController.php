<?php

namespace App\Http\Controllers;

use App\Mail\ClientMail;
use App\Mail\RefuseClientMail;
use App\Mail\OwnerMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\Myreservations;






class emailController extends Controller
{

    public function sendWelcomeEmail(Request $request)
    {

        $user_id = $request->input('user_id');
        $username = $request->input('username');
        // $emailClient = $request->input('email');
        //  $f_name = $request->input('f_name');
        //$l_name = $request->input('l_name');

        $emailClient = "simosins78@gmail.com";
        $f_name = "Jaafar";
        $l_name = "Yassine";
        $object_name = $request->input('object_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $price = $request->input('price');

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
            'email' => $emailOwner,
            'emailClient' => $emailClient
        ];
        if ($request->has('accept')) {
            view()->share('ownerData', $ownerData);
            $pdf = app('dompdf.wrapper')->loadView('emails.pdf', $ownerData);

            Mail::send('emails.owner', $ownerData, function ($message) use ($ownerData, $pdf) {
                $message->to($ownerData['email'])
                    ->subject('Your reservation details')
                    ->attachData(
                        $pdf->output(),
                        "contrat.pdf"
                    );
            });

            Mail::send('emails.client', $ownerData, function ($message) use ($ownerData, $pdf) {
                $message->to($ownerData['emailClient'])
                    ->subject('Your reservation details')
                    ->attachData(
                        $pdf->output(),
                        "contrat.pdf"
                    );
            });

            $reservationId = $request->input('reservation_id');
            $state = $request->input('state');
            Myreservations::updateReservation($reservationId, $state);
            return redirect()->route('reservations');
        } else if ($request->has('refuse')) {

            Mail::to($emailClient)->send(new RefuseClientMail($ownerData));

            $reservationId = $request->input('reservation_id');
            Myreservations::deleteReservation($reservationId);
            return redirect()->route('reservations');
        }
    }







    /* public function pdf()
    {
        $owner = new User();
        $owner_info = $owner::selectUser();
        view()->share('owner_info', $owner_info);
        $pdf = PDF::loadView('emails.pdf', $owner_info);
        return $pdf->download($owner_info->$owner_info[0]->f_name . '.pdf');
    }*/
}
