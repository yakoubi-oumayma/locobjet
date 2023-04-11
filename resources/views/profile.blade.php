@extends("master.navbar")
@section("link-style")
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endsection
@section("content")
    @foreach ($user_infos as $u)
        @php

            $username = $u->username;
            $email = $u->email;
            $f_name = $u->f_name;
            $l_name = $u->l_name;

        @endphp
    @endforeach

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                             alt="" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $username }}
                        </h5>
                        <h6>
                            Morroco,Casablanca
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                   role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">Ads review </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profileUser"
                                   role="tab" aria-controls="profile" aria-selected="false">Review as user</a>
                            </li>
                        </ul>

                    </div>
                </div>




                @if ($email == $email_session)
                    <div class="col-md-2">

                        <a href="{{ route('settings') }}" class="profile-edit-btn"
                           style="text-decoration-line: none;">
                            Edit
                            Profile</a>
                    </div>
                @endif


            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Highlights</p>
                        <a href="" class=" text-muted small text-truncate"><i
                                class="fas fa-quote-left fa-fw text-muted"></i> 1,433 quotes</a><br>

                        <a href="" class=" text-muted small text-truncate"><i
                                class="fas fa-user-friends fa-fw text-muted"></i> 1,046 friends</a><br>

                        <a class=" text-muted small text-truncate"><i class="fas fa-heart"></i>
                            1,046 Likes</a>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                             aria-labelledby="home-tab">
                            <br> <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First name</label>
                                </div>
                                <div class="col-md-6">
                                    <p> {{ $f_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Last name</label>
                                </div>
                                <div class="col-md-6">
                                    <p> {{ $l_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Morocco</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City/Region</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Casablanca</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach ($user_infos as $u)
                                @foreach ($u->receivedReviews as $review)
                                    @php
                                        $comment = $review->comment;
                                        $f_name = $review->fromUser->f_name;
                                        $l_name = $review->fromUser->l_name;
                                        $from = $f_name . ' ' . $l_name;
                                        $review_date = $review->created_at->format('Y-m-d');
                                        $rating = $review->rating;
                                    @endphp





                                    <div class="card mb-4">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="https://images.pexels.com/photos/156917/pexels-photo-156917.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                     class="card-img" alt="The Hobbit">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <p class="card-text">{{ $comment }}</p>
                                                    <p class="card-text"><small class="text-muted">Published:
                                                            {{ $review_date }} </small></p>
                                                    <p class="card-text"><small class="text-muted">Added By: <a
                                                                href="#"> {{ $from }}</a></small></p>


                                                    <p class="text-left"
                                                       style="position:relative; top :10px; left:0px;">
                                                        <span class="text-muted">{{ $rating }}.0</span>

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rating)
                                                                <span class="fa fa-star star-active ml-0"></span>
                                                            @else
                                                                <span class="fa fa-star-o star-inactive"></span>
                                                            @endif
                                                        @endfor
                                                    </p>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>


                        <div class="tab-pane fade" id="profileUser" role="tabpanel" aria-labelledby="profile-tab">


                            @foreach ($reviews as $review)
                                @php
                                    $comment = $review->comment;
                                    $review_date = $review->created_at;
                                    $rating = $review->rating;
                                    $f_name = $review->fromUser->f_name;
                                    $l_name = $review->fromUser->l_name;
                                    $from = $f_name . ' ' . $l_name;
                                @endphp


                                <div class="card mb-4">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="https://images.pexels.com/photos/156917/pexels-photo-156917.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                 class="card-img" alt="The Hobbit">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <p class="card-text">{{ $comment }}</p>
                                                <p class="card-text"><small class="text-muted">Published:
                                                        {{ $review_date }} </small></p>
                                                <p class="card-text"><small class="text-muted">Added By: <a
                                                            href="#">
                                                            {{ $from }}</a></small></p>


                                                <p class="text-left" style="position:relative; top :10px; left:0px;">
                                                    <span class="text-muted">{{ $rating }}.0</span>

                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $rating)
                                                            <span class="fa fa-star star-active ml-0"></span>
                                                        @else
                                                            <span class="fa fa-star-o star-inactive"></span>
                                                        @endif
                                                    @endfor
                                                </p>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection


