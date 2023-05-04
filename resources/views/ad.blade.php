@extends("master.navbar")
@section("content")



    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">{{$ad->title}}</h2>
                <p></p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="sidebar">
                                        @foreach($ad_images as $img)
                                         <img class="img-fluid d-block small-preview" src="{{asset("storage/".$img->imagename)}}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3>{{$ad->name}}</h3>
                                <div class="rating"><img src="{{asset("assets/img/star.svg")}}"><img
                                        src="{{asset("assets/img/star.svg")}}"><img
                                        src="{{asset("assets/img/star.svg")}}"><img
                                        src="{{asset("assets/img/star-half-empty.svg")}}"><img
                                        src="{{asset("assets/img/star-empty.svg")}}"></div>
                                <div class="price">
                                    <h3>{{$ad->price}} MAD</h3>
                                </div>
                                @guest
                                    <a href="/login" class="btn btn-primary" type="button">Se connecter pour réserver</a>
                                @else
                                @if(Auth::user()->user_id == $ad->user_id)
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" disabled><i class="icon-basket"></i>Réserver</button>
                                @else
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-basket"></i>Réserver</button>
                                @endif
                                @endguest



                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Précisez la période de votre réservation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Date de début de réservation</label>
                                                        <input type="date" class="form-control"  name="date_debut">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="">Date de fin de réservation</label>
                                                        <input type="date" class="form-control" name="date_fin">
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="submit" value={{$ad->ad_id}} >Envoyer votre demande</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="summary">
                                    <p>{{$ad->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                                                        data-bs-toggle="tab" id="description-tab"
                                                                        href="#description">Description</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
                                                                        id="reviews-tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <div class="row">
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img"
                                                                    src="{{asset("storage/".$ad_images[0]->imagename)}}">
                                        </figure>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Description</h4>
                                        <p>{{$ad->description}}</p>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                @foreach($ad_reviews as $review)
                                    <div class="reviews">
                                        <div class="review-item">
                                            <span class="text-muted"><a href="#">{{$review->username}}</a></span>
                                            <h4>{{$review->comment}}</h4>
                                            <div class="rating">
                                                @for($i=0;$i<$review->rating;$i++)
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                @endfor
                                                    @for($i=0;$i<5-$review->rating;$i++)
                                                        <img src="{{asset("assets/img/star-empty.svg")}}">
                                                    @endfor
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clean-related-items">
                    <h3>Annonces semblables</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            @foreach($related_ads as $related_ad)
                                @if($related_ad->ad_id != $ad->ad_id)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="clean-related-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto"
                                                                                src="{{asset("storage/".$related_ads_images[$related_ad->ad_id])}}"></a>
                                            </div>
                                            <div class="related-name"><a href="#">{{$related_ad->name}}</a>
                                                <div class="rating"><img src="{{asset("assets/img/star.svg")}}"><img
                                                        src="{{asset("assets/img/star.svg")}}"><img
                                                        src="{{asset("assets/img/star.svg")}}"><img
                                                        src="{{asset("assets/img/star-half-empty.svg")}}"><img
                                                        src="{{asset("assets/img/star-empty.svg")}}"></div>
                                                <h4>{{$related_ad->price}} MAD</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(Session::has('error_disponiblity1'))
        <script>
            swal("Message", "{{ Session::get('error_disponiblity1') }}", {
                button: "Ok",
                icon: "error"
            });
        </script>
    @endif

    @if(Session::has('error_disponiblity2'))
        <script>
            swal("Erreur", "{{ Session::get('error_disponiblity2') }}", {
                button: "Ok",
                icon: "error"
            });
        </script>
    @endif
    @if(Session::has('error_minRentDay'))
        <script>
            swal("Erreur", "{{ Session::get('error_minRentDay') }}", {
                button: "Ok",
                icon: "error"
            });
        </script>
    @endif
    @if(Session::has('error_disponiblity3'))
        <script>
            swal("Erreur", "{{ Session::get('error_disponiblity3') }}", {
                button: "Ok",
                icon: "error"
            });
        </script>
    @endif
    @if(Session::has('storeReservation'))
        <script>
            swal("Avec succès", "{{ Session::get('storeReservation') }}", {
                button: "Ok",
                icon: "success"
            });
        </script>
    @endif


    @if(Session::has('error_dates'))
        <script>
            swal("Erreur", "{{ Session::get('error_dates') }}", {
                button: "Ok",
                icon: "error"
            });
        </script>
    @endif

@endsection
