<?php

namespace App\Models;

use App\Http\Controllers\AdController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class AdReservation extends Model
{
    use HasFactory;


    //1- Vérifier si un objet est déjà réservé
    public static function isAlreadyReserved($ad_id, $start, $end)
    {
        // in this function '1' means that the ad is already reserved '0' not reserved
        $reservations = DB::select('SELECT start_date, end_date FROM reservation WHERE ad_id=? ', [$ad_id]);

        if(empty($reservations)){
            $i=0;
        }
        else{
            foreach ($reservations as $reservation){
                if($start < $reservation->start_date ){
                    if($end > $reservation->start_date){
                        $i=1;
                        break;
                    }
                    else{
                        $i=0;
                    }
                }
                elseif ($reservation->start_date<=$start && $start <= $reservation->end_date){
                    $i=1;
                    break;
                }
                else{
                    $i=0;
                }
            }
        }
        if($i==0){
            return false;
        }
        else{
            return true;
        }

    }


    //2- Comparer date de début de la réservation et la date à partir de laquelle l'objet est disponible

    public  static function isAvailableFrom($ad_id, $start, $end){

        $availablity=DB::select('SELECT available_from, available_end  FROM Ads WHERE ad_id=?', [$ad_id]);
        if($start < $availablity[0]->available_from || $end > $availablity[0]->available_end ){
            return 0;
        }else{
            return 1;
        }
    }
    public static function eqMinRentPeriod($ad_id, $start, $end){
        $minRentPeriod=DB::select('SELECT min_rent_period FROM Ads WHERE ad_id=?', [$ad_id]);

        $start = \Carbon\Carbon::createFromFormat('Y-m-d', $start);
        $end = \Carbon\Carbon::createFromFormat('Y-m-d', $end);
        $diffInDays = $start->diffInDays($end);

        if($diffInDays<$minRentPeriod[0]->min_rent_period){
            return 0;
        }
        else{
            return 1;
        }

    }

    public  static function isAvailableAllTime($ad_id){
    $ad_disponibility=DB::select('SELECT ads.availability FROM ads WHERE ad_id=?', [$ad_id]);
        if($ad_disponibility[0]->availability=='allTime'){
                return 1;
        }
        else{
                return 0;
        }
    }
    public static function isAvailableMonthDay($ad_id, $start, $end){
        $dayMonths=DB::select('SELECT ads_availability.day ,ads_availability.month FROM ads_availability WHERE ad_id=?', [$ad_id]);
        $has_monthS = 0;
        $has_monthE= 0;

        if($dayMonths[0]->month == 0){
            return -1;
        }

        else{
            $monthS = date("m", strtotime($start));
            $monthE = date("m", strtotime($end));

            foreach ($dayMonths as $dayMonth) {
                if ($dayMonth->month == $monthS ) {
                    $has_monthS = 1;
                    break;
                }
            }
            if($has_monthS==0){
            }
            else{
                foreach ($dayMonths as $dayMonth) {
                    if ($dayMonth->month == $monthE ) {
                        $has_monthE = 1;
                        break;
                    }
                }
                if($has_monthE==0){
                }
                else {
                    return 1; //1 cad que l'objet disponible pendant les mois saisis
                }
            }
        }


    }
    public static function showAvailableDays($ad_id){
        $availableDays=DB::select('SELECT DISTINCT ads_availability.day FROM ads_availability WHERE ad_id =? GROUP BY day', [$ad_id]);
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        if($availableDays[0]->day==0){
            return $daysOfWeek;
        }
        else{
            $i=0;
            $daysAvailab =[];

            foreach ($availableDays as $availableDay){
                $daysAvailab[$i]=$daysOfWeek[$availableDay->day-1];
                $i++;

            }
            return $daysAvailab;
        }

    }

    public static function numberOfDays($ad_id, $start, $end){
        $daysAvailabList=self::showAvailableDays($ad_id);
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end =   Carbon::createFromFormat('Y-m-d', $end);
        $nb=0;
        for ($date=$start; $date <= $end; $date->addDay()) {
            $date->locale('fr');
            $day = $date->format('l');
            if(in_array($day, $daysAvailabList)){
                $nb++;
            }

        }
        return $nb;
        }
    public static function insertReservation($ad_id , $start , $end , $user_id){
        DB::insert('INSERT INTO reservation (start_date, end_date, ad_id, user_id ) VALUES (?,?,?,?)', [$start, $end, $ad_id, 1]);
    }
}

