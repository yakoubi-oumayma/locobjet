<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



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

    public function showAdsByCategory($cat_ids,$cities,$price){
        $all_categories = Ad::getAllCategories();
        $ads_info = Ad::getAdsByFiltre($cat_ids,$cities,$price);
        $all_ads = $ads_info["all_ads"];
        $ad_images = $ads_info["ad_images"];
        return view("all_ads",compact("all_ads","ad_images",'cat_ids','cities','price','all_categories'));
    }


    public function showAd(Request $request, $ad_id)
    {
        $info = Ad::getAdInfo($ad_id);
        $ad = $info["ad_infos"];
        $ad_images = $info["ad_images"];
        $ad_reviews = $info["ad_reviews"];
        $related_ads_info = Ad::getAdsByFiltre($ad->category_id,"null","null");
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'city' => 'required',
            'category_id' => 'required',
            'item_images' => 'required',
            'title' => 'required',
            'available_from' => 'required',
            'available_end' => 'required',
            'min_rent_period' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $i=Ad::addAd($request->name, $request->price, $request->city, $request->description, $request->category_id,
            $request->item_images,
            $request->title, $request->available_from, $request->available_end, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);
        if($i==1){
                return back()->with('success_message', 'annonce bien enregistrée');
        }
        else if ($i==0)
            return back()->with('error_message', 'vous avez atteint le nombre max des annonces actives');
    }


    // creer une annonce pour un objet deja existant

    public function storeExistenItemAd(Request $request ){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'available_from' => 'required',
            'available_end' => 'required',
            'min_rent_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $i=Ad::addExistenItemAd($request->submit,
            $request->title, $request->available_from, $request->available_end, $request->min_rent_period, $request->availability ,
            $request->available_month, $request->available_days);

        if($i==1){
            return back()->with('success_message', 'annonce bien enregistrée');
        }
        else if ($i==0)
            return back()->with('error_message', 'vous avez atteint le nombre max des annonces actives');
    }


    public function ShowMyAds(){
        $user_id = Auth::user()->user_id;
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
            return back()->with('error_dates', 'Impossible! Date de début est superieur à la date de fin');

        }
        else{
            $reserved=AdReservation::isAlreadyReserved($ad_id, $start, $end );
            if($reserved){
                return back()->with('error_disponiblity1', 'Cette objet a été déjà réservé pour la période que vous avez indiqué');
            }
            else{
                $disponible=AdReservation::isAvailableFrom($ad_id, $start, $end);
                if($disponible==0){
                    return back()->with('error_disponiblity2', 'Objet n est pas disponible, vérifiez la disponibilité de cette objet!');
                }
                else{
                    $minimumperiod=AdReservation::eqMinRentPeriod($ad_id, $start, $end);
                    if($minimumperiod==0){
                        return back()->with('error_minRentDay', 'la periode de location que vous avez choisi est inférieur à la période minimal indiquée par le partenaire');
                    }
                    else{
                        $availableAllTime=AdReservation::isAvailableAllTime($ad_id);
                        if($availableAllTime==1){
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
                                return back()->with('error_disponiblity3', 'Objet n est pas disponible, vérifiez la disponibilité de cette objet!');

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
        $user_id =Auth::user()->user_id;
        AdReservation::insertReservation( $ad_id,$start , $end ,$user_id );
        // methode pour update state of ad to inactive
        AdReservation::updateToInactive($ad_id);
        return back()->with('storeReservation', 'Votre réservation a été bien envoyée!');


    }

    public function editAd($ad_id){
        $ad = Ad::getAdInfo($ad_id);
        $ad_infos = $ad["ad_infos"];
        $ad_images = $ad["ad_images"];
        return view("edit_ad", compact("ad_infos", "ad_images"));
    }

    public function updateAd(Request $request){
        $new_infos = [];
        $new_infos["ad_id"] = $request->ad_id;
        $new_infos["title"] = $request->title;
        $new_infos["min_rent_period"] = $request->min_rent_period;
        $new_infos["available_from"] = $request->available_from;

        if ($request->state == "active"){
            $new_infos["state"] = "active";
        }
        else{
            $new_infos["state"] = "inactive";
        }
        Ad::updateAd($new_infos);
        return redirect()->back();
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
