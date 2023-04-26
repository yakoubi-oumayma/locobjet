<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;




use Illuminate\Support\Facades\DB;



class AdController extends Controller
{
    public function index(){
        return view('add_ads');
    }

    public function showAllAds(){
        $all_categories = Ad::getAllCategories();
        $ads_info = Ad::getAllAd();
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("all_ads",compact("all_ads","ad_images", "all_categories"));
    }

    public function showAdsByCategory($cat_ids){
        $all_categories = Ad::getAllCategories();
        $ads_info = Ad::getAdsByCategory($cat_ids);
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("all_ads",compact("all_ads","ad_images",'cat_ids','all_categories'));
    }


    public function showAd(Request $request, $ad_id)
    {
        $info = Ad::getAdInfo($ad_id);
        $ad = $info["ad_infos"];
        $ad_images = $info["ad_images"];
        $ad_reviews = $info["ad_reviews"];
        $related_ads_info = Ad::getAdsByCategory($ad->category_id);
        $related_ads = $related_ads_info["all_ads"];
        $related_ads_images = $related_ads_info["ad_images"];
        return view("ad",compact("ad","ad_images","ad_reviews", "related_ads", "related_ads_images"));
    }

    public function createAdFromItem($itemId)
    {
        [$item , $itemImages]=Ad::searchByItemId($itemId);

        return view('create_ad', compact('item' ,'itemImages' ));

    }
    public function createAd()
    {
        return view('create_ad');
    }


    public  function storeAd(Request $request ){
        Ad::addAd($request->name, $request->price, $request->city, $request->description, $request->category_id,
            $request->item_images,
            $request->title, $request->available_from, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);
    }


    // creer une annonce pour un objet deja existant

    public function storeExistenItemAd(Request $request ){

        Ad::addExistenItemAd($request->submit,
            $request->title, $request->available_from, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);
    }

    public function ShowMyAds(){
        $user_id = 1;
        $ads_info = Ad::getAllAdsByUserId($user_id);
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("my_ads",compact("all_ads","ad_images"));
        }


    public function verifyReservation(Request $request){
        $ad_id=$request->submit;
        $start=$request->date_debut;
        $end=$request->date_fin;
        if($start>$end){
            echo "Erreur!! Vérifiez les dates que vous avez saisis";
        }
        else{
            $reserved=AdReservation::isAlreadyReserved($ad_id, $start, $end );
            if($reserved){
                echo "Objet indisponible il est deja reservé";
            }
            else{
                $disponible=AdReservation::isAvailableFrom($ad_id, $start);
                if($disponible==0){
                    echo "mazal mashi disponible";
                }
                else{
                    echo "Objet disponibbbble";
                    $minimumperiod=AdReservation::eqMinRentPeriod($ad_id, $start, $end);
                    if($minimumperiod==0){
                        echo "la periode de location que vous avez choisi est inférieur à celle indiquée par le partenaire ";
                    }
                    else{
                        $availableAllTime=AdReservation::isAvailableAllTime($ad_id);
                        if($availableAllTime==1){
                            echo "disponible allTime";
                            echo "Toutes les conditions sont vérifiés";
                            echo "On va envoyer la réservation";
                            $info = Ad::getAdInfo($ad_id);
                            $ad = $info["ad_infos"];
                            $start = Carbon::createFromFormat('Y-m-d', $start)->setTime(0, 0, 0);;
                            $end = Carbon::createFromFormat('Y-m-d', $end)->setTime(0, 0, 0);;
                            $nbDays = $start->diffInDays($end);
                            return view("confirmReservation",compact("ad","start","nbDays", "end"));

                        }
                        else{
                            $AvailableMonthDay=AdReservation::isAvailableMonthDay($ad_id, $start, $end);
                            if($AvailableMonthDay==0){
                                echo "l'objet n'est pas disponible dans ce mois";
                            }
                            else{
                                $availableDay=AdReservation::showAvailableDays($ad_id);
                                $info = Ad::getAdInfo($ad_id);
                                $ad = $info["ad_infos"];
                                $nbDays=AdReservation::numberOfDays($ad_id, $start, $end);
                                return view("confirmReservation",compact("ad","start","nbDays", "end", "availableDay"));



                            }

                        }
                    }


                }


            }
        }

        }
    public function storeReservations($ad_id,$start, $end ){
        AdReservation::insertReservation( $ad_id,$start , $end , 1);
    }


    public function search(Request $request)
    {

        $output="";
        $searchTerm = $request->search;
        $data = DB::table('items')
            ->join('ads', 'ads.item_id', '=', 'items.item_id')
            ->select('items.*','ads.*', 'ads.title as ads_title')
            ->where(function ($query) use ($searchTerm) {
                $query->where('ads.title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('items.description', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('items.name', 'LIKE', '%' . $searchTerm . '%');
            })
            ->get();

        foreach ($data as $ad){
        $ad_image = DB::select("SELECT imagename FROM item_images,ads,items WHERE ads.ad_id=? AND ads.item_id=items.item_id AND item_images.item_id=items.item_id LIMIT 1",[$ad->ad_id]);
            $output.='<div class="row g-0">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="/ad/'.$ad->ad_id.'"><img class="img-fluid d-block mx-auto"
                                                                                src="'.asset("storage/".$ad_image[0]->imagename).'"></a>
                                            </div>
                                            <div class="product-name"><a href="/ad/'.$ad->ad_id.'">'.$ad->title.'</a></div>
                                            <div class="about">
                                                <div class="price">
                                                    <h3>'.$ad->price.' MAD</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';

        }
        return response($output);


    }
}
