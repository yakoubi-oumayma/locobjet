<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Brand</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset("assets/fonts/simple-line-icons.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/baguetteBox.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/vanilla-zoom.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/navbar.css")}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-..checksum.." crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-..checksum.." crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
   @yield("link-style")

</head>
<header class="header">
    <a href="/" class="logo"><span class="logo-first">LOC</span>OBJET</a>
    @guest
        <ul class="navbar-nav ms-auto">
            <nav class="nav-items">
                <a href="/login">Se connecter</a>
                <a href="/register">S'inscrire</a>
                <a href="/my_reservation">Mes reservations</a>
                <a href="/my_locations">Mes locations</a>
                <button class="custom-btn btn-5"><span>Ajouter annonce</span></button>
            </nav>
        </ul>
    @else
        <ul class="navbar-nav ms-auto">
            <nav class="nav-items">
                <a href="{{route("myAds")}}">Mes annonces</a>
                <a href="#">Mes objets</a>
                <a href="#">My Id : {{Auth::user()->user_id }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>

                <button class="custom-btn btn-5"><span>Ajouter annonce</span></button>
            </nav>
        </ul>
    @endguest

</header>
<body>
<main class="view-content">
    @yield("content")
</main>
<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/baguetteBox.min.js")}}"></script>
<script src="{{asset("assets/js/vanilla-zoom.js")}}"></script>
<script src="{{asset("assets/js/theme.js")}}"></script>
</body>

</html>

</body>
