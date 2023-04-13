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
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <title>Select Item</title>
</head>
<body>


<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-9 col-lg-12 col-xxl-11 offset-xxl-1">
                        <div class="products" style="padding-right: 60px;padding-left: 62px;">
                            <div class="row g-0">
                                @foreach($items as $item)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image">
                                                <a href="{{route("createAdFromItem",["item_id" => $item->item_id])}}">
                                                    <img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg">
                                                </a>
                                            </div>
                                            <div class="product-name">
                                                <h5>Objet: {{$item->item_name}}</h5><br>
                                                <h7>Categorie: {{$item->category_name}}</h7><br>
                                                <span>Description: {{substr($item->description,0,28)}}</span><br>
                                                <span>Disponible à: {{$item->city}}</span><br><br>
                                                <button class="btn btn-primary" style="margin-right: 5px;" type="submit" data-toggle="modal" data-target="#edit{{$item->item_id}}"><i class="fa fa-pen " style="font-size: 15px; "></i>Editer</button>
                                                <button class="btn btn-success" style="margin-left: 5px;background-color: orangered; border: none;" type="submit"><i class="fa fa-check" style="font-size: 15px; color: white"></i>
                                                    <a href="{{route("createAdFromItem",["item_id" => $item->item_id])}}" style="color: white">
                                                    Publier</a></button>
                                            </div>
                                            <!-- Modal -->
                                            <div id="edit{{$item->item_id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">objet n°{{$item->item_id}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                                        </div>
                                                        <form method="post">
                                                            @csrf
                                                        <div class="modal-body">
                                                            <h5>Nom</h5>
                                                            <input type="hidden" name="item_id" value="{{$item->item_id}}">
                                                            <input type="text" name="name" class="form-control" value="{{$item->item_name}}" />
                                                            <h5>Description</h5>
                                                            <textarea name="description" class="form-control" style="width: 100%; height: 150px;">{{$item->description}}</textarea>
                                                            <h5>Prix</h5>
                                                            <div class="input-group mb-3">
                                                                <input type="number" name="price" class="form-control" value="{{$item->price}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">Dh</span>
                                                                </div>
                                                            </div>
                                                            <h5>Ville De Disponibilité</h5>
                                                            <div class="form-group">
                                                                <select class="form-select" name="city">
                                                                    <option selected>{{$item->city}}</option>
                                                                    <option value="tetouan">Tétouan</option>
                                                                    <option value="tanger" >Tanger</option>
                                                                    <option value="rabat">Rabat</option>
                                                                    <option value="casablanca">Casablanca</option>
                                                                    <option value="marrakech">Marrakech</option>
                                                                    <option value="agadir">Agadir</option>
                                                                    <option value="meknes">Méknes</option>
                                                                    <option value="fes">Fès</option>
                                                                </select>
                                                            </div>
                                                            <h5>Categorie</h5>
                                                                <div class="form-group">
                                                                    <select class="form-select" name="category_id">
                                                                        <option value="{{$item->category_id}}" selected> {{$item->category_name}}</option>
                                                                        @foreach($categories as $category)
                                                                            @if ($category->category_id != $item->category_id)
                                                                                <option value="{{$category->category_id}}">{{$category->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Modal2 -->
                                            <div id="validate{{$item->item_id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Item ID: {{$item->item_id}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
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
                                                    <h3>{{$item->price}}DH</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link">1</a></li>
                                    <li class="page-item"><a class="page-link">2</a></li>
                                    <li class="page-item"><a class="page-link">3</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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

