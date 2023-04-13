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
                                                              src="{{asset("storage/".$ad_images[0]->imagename)}}"><img
                                            class="img-fluid d-block small-preview"
                                            src="{{asset("storage/".$ad_images[1%count($ad_images)]->imagename)}}"><img
                                            class="img-fluid d-block small-preview"
                                            src="{{asset("storage/".$ad_images[2%count($ad_images)]->imagename)}}"></div>
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
                                <button class="btn btn-primary" type="button"><i class="icon-basket"></i>Réserver
                                </button>
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
                                <p>{{$ad->description}}</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img"
                                                                    src="{{asset("storage/".$ad_images[0]->imagename)}}">
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
                                                                    src="{{asset("storage/".$ad_images[1%count($ad_images)]->imagename)}}">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                @foreach($ad_reviews as $review)
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating">
                                                @for($i=0;$i<$review->rating;$i++)
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                @endfor
                                                @for($i=0;$i<5-$review->rating;$i++)
                                                    <img src="{{asset("assets/img/star-empty.svg")}}">
                                                @endfor
                                            </div>
                                            <h4>{{$review->comment}}</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <p></p>
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
