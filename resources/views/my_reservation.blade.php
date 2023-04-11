@extends("master.navbar")
@section("content")
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"  style=" color:orangered !important; ">Mes reservations </h2>
            </div>
            <div class="content">
                    <div class="col-md-9">
                        <div class="products"  style="margin-left: 180px">
                            <div class="row g-0">
                                @foreach($all_ads as $ad)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item"  style="width: 300px>
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                                src="{{asset("assets/img/tech/image2.jpg")}}"></a>
                                            </div>
                                            <div class="product-name" style="font-weight: bold"><a href="#">{{$ad->title}}</a></div>
                                            <div >
                                                <h6>{{$ad->description}}</h6>
                                            </div>
                                            <div class="about">
                                                <br>
                                                        @if(  (strtotime($dt)-strtotime($ad->end_date))<604800 )
                                                    <button type="button" class="btn btn-primary" style="width: 140px" data-bs-toggle="modal" data-bs-target="#modif{{$ad->ad_id}}">Ajouter commentaire</button>
                                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    @foreach($all_ads as $ad)
                                        <div class="modal fade" id="modif{{$ad->ad_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un commentaire sur l'objet et la sympathie du partenaire</h4>
                                                    </div>
                                                    <form method="post" action="" >
                                                        @csrf
                                                        <div class="mb-3">
                                                            <h6  style="margin-left: 20px;"><span style="font-weight: bolder; color: orangered !important;">l'objet : </span>{{$ad->title}}</h6>
                                                            <label for="message-text" class="col-form-label" style="margin-left: 20px;font-weight: bolder">le commentaire : </label>
                                                            <input class="form-control" id="message-text" name="comment" value="">
                                                            <label for="message-text"   style="margin-left: 20px; font-weight: bolder" class="col-form-label">Sa note sur 5 : </label>
                                                            <br>
                                                            <input  type="radio" id="1" name="rating" value="1">
                                                            <label   style="margin-left: 10px" for="1">1 étoile</label><br>
                                                            <input type="radio" id="2" name="rating" value="2">
                                                            <label   style="margin-left: 10px" for="2">2 étoiles</label><br>
                                                            <input type="radio" id="3" name="rating" value="3">
                                                            <label  style="margin-left: 10px" for="3">3 étoiles</label><br>
                                                            <input type="radio" id="4" name="rating" value="4">
                                                            <label  style="margin-left: 10px" for="4">4 étoiles</label><br>
                                                            <input type="radio" id="5" name="rating" value="5">
                                                            <label  style="margin-left: 10px" for="5">5 étoiles</label><br>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit" value="{{$ad->ad_id}}">Ajouter</button>
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
