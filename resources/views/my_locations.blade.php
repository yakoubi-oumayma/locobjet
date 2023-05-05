@extends("master.navbar")
@section("content")
    <section class="clean-block clean-catalog dark" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"  style=" color:orangered !important; ">Mes locations </h2>
            </div>
            <div class="content">
                <div class="col-md-9">
                    <div class="products" style="margin-left: 180px">
                        <div class="row g-0">
                            @foreach($all_ads as $ad)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="clean-product-item" style="width: 300px">
                                        <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                            src="{{asset("assets/img/tech/image2.jpg")}}"></a>
                                        </div>
                                        <div class="product-name" style="font-weight: bold"><a href="#"> {{$ad->title}}</a></div>
                                        <div >
                                            <h6>{{$ad->description}}</h6><br>
                                            <h6><span style="color:orangered; font-weight: bold;">Username de locataire :</span>  {{$ad->username}}</h6><br>
                                            <h6><span style="color:orangered; font-weight: bold;">Date de fin :</span>  {{$ad->end_date}}</h6>
                                            <br>
                                        </div>
                                        <div class="about">
                                            <br>
                                            @if(  (strtotime($dt)>strtotime($ad->end_date)))
                                                @if( (strtotime($dt)-strtotime($ad->end_date))<604800 )
                                                    @if(app('App\Http\Controllers\MyreservationsController')-> getcommentadded(Auth::user()->user_id,$ad->reservation_id)>0)
                                                        <button type="button" class="btn btn-primary" style="width: 200px ;" data-bs-toggle="modal" data-bs-target="#modif{{$ad->client}}" disabled>Ajouter commentaire sur le locataire</button>
                                                    @else
                                                        <button type="button" class="btn btn-primary" style="width: 200px ;" data-bs-toggle="modal" data-bs-target="#modif{{$ad->client}}">Ajouter commentaire sur le locataire</button>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($all_ads as $ad)
                                <div class="modal fade" id="modif{{$ad->client}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un commentaire sur la sympathie du locataire</h4>
                                            </div>
                                            <form method="post" action="" >
                                                @csrf
                                                <div class="mb-3">
                                                    <h6 style="margin-left: 20px;"><span  style="font-weight: bolder; color: orangered !important;">Le locataire</span> : {{$ad->username}}</h6>
                                                    <input type="hidden" id="reservation_id" name="reservation_id" value=" {{$ad->reservation_id}}" />
                                                    <label  for="message-text" class="col-form-label" style="margin-left: 20px;font-weight: bolder">Le commentaire : </label>
                                                    <input style="padding: 10px" class="form-control" id="message-text" name="comment" value="">
                                                    <label    style="margin-left: 20px; font-weight: bolder" for="message-text" class="col-form-label">Sa note sur 5 : </label>
                                                    <br>
                                                    <input  style="margin-left: 10px" type="radio" id="1" name="rating" value="1">
                                                    <label for="1">1 étoile</label><br>
                                                    <input  style="margin-left: 10px" type="radio" id="2" name="rating" value="2">
                                                    <label for="2">2 étoiles</label><br>
                                                    <input  style="margin-left: 10px" type="radio" id="3" name="rating" value="3">
                                                    <label for="3">3 étoiles</label><br>
                                                    <input style="margin-left: 10px" type="radio" id="4" name="rating" value="4">
                                                    <label for="4">4 étoiles</label><br>
                                                    <input   style="margin-left: 10px" type="radio" id="5" name="rating" value="5">
                                                    <label for="5">5 étoiles</label><br>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit" value="{{$ad->client}}">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span
                                            aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next"><span
                                            aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

@endsection
