@extends('master.navbar')
@section('content')
    <!doctype html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <title>Select Item</title>
</head>

<body>


<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="block-heading">
            <h2 class="text-info">Reservation en attente</h2>
        </div>

        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-9 col-lg-12 col-xxl-11 offset-xxl-1">
                        <div class="products" style="padding-right: 60px;padding-left: 62px;">
                            <div class="row g-0">
                                @foreach ($reservations as $reservation)
                                    @php
                                        $client = \App\Models\User::getUserById($reservation->client);
                                    @endphp
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image">
                                                <img class="img-fluid d-block mx-auto"
                                                     src="assets/img/tech/image2.jpg">
                                            </div>
                                            <div class="product-name">
                                                <h3>Id: {{ $reservation->reservation_id }}</h3>
                                                <h3>Titre : {{ $reservation->title }}</h3>
                                                <h3>Description : {{ $reservation->description }}</h3>
                                                <h3>Client : {{ $client[0]->username }}</h3>

                                                <button class="btn btn-success" style="margin-right: 5px;"
                                                        type="submit" data-toggle="modal"
                                                        data-target="#accept{{ $reservation->reservation_id }}">
                                                    <i class="fa fa-check " style="font-size: 15px; "></i>Accepter
                                                </button>
                                                <button class="btn btn-danger" style="margin-left: 5px;"
                                                        type="submit" data-toggle="modal"
                                                        data-target="#reject{{ $reservation->reservation_id }}">
                                                    <i class="fa fa-x"
                                                       style="font-size: 15px; color: white"></i>Refuser
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div id="accept{{ $reservation->reservation_id }}" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Reservation
                                                                ID: {{ $reservation->reservation_id }}</h4>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">x
                                                            </button>
                                                        </div>
                                                        <form method="post" name="accept"
                                                              action="{{ route('sentEmail') }}">
                                                            @csrf
                                                            <input type="hidden" name="reservation_id"
                                                                   value="{{ $reservation->reservation_id }}">

                                                            <input type="hidden" name="state" value="accepted">

                                                            <input type="hidden" name="user_id"
                                                                   value="{{ $client[0]->user_id }}">
                                                            <input type="hidden" name="email"
                                                                   value="{{ $client[0]->email }}">
                                                            <input type="hidden" name="f_name"
                                                                   value="{{ $client[0]->f_name }}">
                                                            <input type="hidden" name="l_name"
                                                                   value="{{ $client[0]->l_name }}">
                                                            <input type="hidden" name="username"
                                                                   value="{{ $client[0]->username }}">
                                                            <input type="hidden" name="start_date"
                                                                   value="{{ $reservation->start_date }}">
                                                            <input type="hidden" name="end_date"
                                                                   value="{{ $reservation->end_date }}">
                                                            <input type="hidden" name="object_name"
                                                                   value="{{ $reservation->title }}">
                                                            <input type="hidden" name="price"
                                                                   value="{{ $reservation->price }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal" name="close">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary"
                                                                        name="accept">Accepte
                                                                </button>

                                                            </div>
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Modal2 -->
                                            <div id="reject{{ $reservation->reservation_id }}" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Reservation
                                                                ID: {{ $reservation->reservation_id }}</h4>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                        <form method="post" name="refuse"
                                                              action="{{ route('sentEmail') }}">
                                                            @csrf
                                                            <input type="hidden" name="reservation_id" value="{{ $reservation->reservation_id }}">

                                                            <input type="hidden" name="user_id"
                                                                   value="{{ $client[0]->user_id }}">
                                                            <input type="hidden" name="email"
                                                                   value="{{ $client[0]->email }}">
                                                            <input type="hidden" name="f_name"
                                                                   value="{{ $client[0]->f_name }}">
                                                            <input type="hidden" name="l_name"
                                                                   value="{{ $client[0]->l_name }}">
                                                            <input type="hidden" name="username"
                                                                   value="{{ $client[0]->username }}">
                                                            <input type="hidden" name="start_date"
                                                                   value="{{ $reservation->start_date }}">
                                                            <input type="hidden" name="end_date"
                                                                   value="{{ $reservation->end_date }}">
                                                            <input type="hidden" name="object_name"
                                                                   value="{{ $reservation->title }}">
                                                            <input type="hidden" name="price"
                                                                   value="{{ $reservation->price }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-danger"
                                                                        name="refuse">Refuse</button>
                                                            </div>
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal2 -->

                                            <div class="about">
                                                <div class="rating">
                                                    <img src="assets/img/star.svg">
                                                    <img src="assets/img/star.svg">
                                                    <img src="assets/img/star.svg">
                                                    <img src="assets/img/star-half-empty.svg">
                                                    <img src="assets/img/star-empty.svg">
                                                </div>
                                                <div class="price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link"
                                                                      aria-label="Previous"><span aria-hidden="true">«</span></a></li>
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
</main>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Get started</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">Downloads</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>About us</h5>
                <ul>
                    <li><a href="#">Company Information</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help desk</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2023 Copyright Text</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/baguetteBox.min.js"></script>
<script src="assets/js/vanilla-zoom.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>
@endsection
