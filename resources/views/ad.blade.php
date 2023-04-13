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
                                    <div class="sidebar"><img class="img-fluid d-block small-preview"
                                                              src="{{asset("assets/img/tech/image2.jpg")}}"><img
                                            class="img-fluid d-block small-preview"
                                            src="{{asset("assets/img/tech/image1.jpg")}}"><img
                                            class="img-fluid d-block small-preview"
                                            src="{{asset("assets/img/tech/image2.jpg")}}"></div>
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
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-basket"></i>Réserver</button>


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
                                                                        id="specifications-tabs" href="#specifications">Specifications</a>
                            </li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
                                                                        id="reviews-tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <p>{{$ad->description}}</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img"
                                                                    src="{{asset("assets/img/tech/image3.png")}}">
                                        </figure>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna,
                                            dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 right">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna,
                                            dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img"
                                                                    src="{{asset("assets/img/tech/image3.png")}}">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="stat">Display</td>
                                            <td>5.2"</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">Camera</td>
                                            <td>12MP</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">RAM</td>
                                            <td>4GB</td>
                                        </tr>
                                        <tr>
                                            <td class="stat">OS</td>
                                            <td>iOS</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star-half-empty.svg")}}"><img
                                                src="{{asset("assets/img/star-empty.svg")}}"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc,
                                            pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star.svg")}}"><img
                                                src="{{asset("assets/img/star-half-empty.svg")}}"><img
                                                src="{{asset("assets/img/star-empty.svg")}}"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc,
                                            pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
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
                                                                                src="{{asset("assets/img/tech/image2.jpg")}}"></a>
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

@endsection
