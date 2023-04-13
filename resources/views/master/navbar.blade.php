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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-..checksum.." crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-..checksum.." crossorigin="anonymous"></script>


   @yield("link-style")





</head>
<header class="header">
    @guest
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="/all-ads" class="logo"><span class="logo-first">LOC</span>OBJET</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="  margin-left: auto;">
                </ul>
                <ul class="navbar-nav ml-auto" style="margin-left: auto; margin-right: 30px">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/register">S'inscrire</a>
                    </li>
                </ul>
            </div>
        </nav>

    @else
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="/all-ads" class="logo"><span class="logo-first">LOC</span>OBJET</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="  margin-left: auto;">
                    <a href="{{route("addAd")}}" class="custom-btn btn-5" style="text-decoration-line: none"><span style="margin-left: 10px">Ajouter annonce</span></a>
                </ul>
                <ul class="navbar-nav ml-auto" style="margin-left: auto; margin-right: 30px">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" style="margin-left: -100px" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="{{route("myAds")}}">Mes annonces</a>
                            <a class="dropdown-item" href="{{route("allItems")}}">Mes objets</a>
                            <a class="dropdown-item" href="{{route("myLocations")}}">Mes locations</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                            <button class="dropdown-item">Se déconnecter</button>
                            </form>
                        </div>
                    </li>
                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifDropdown">
                            <a class="dropdown-item" href="#">Notification 1</a>
                            <a class="dropdown-item" href="#">Notification 2</a>
                            <a class="dropdown-item" href="#">Notification 3</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">View All Notifications</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-envelope"></i>
                            <span class="badge badge-danger">1</span>
                        </a>
                    </li>
                    -->

                </ul>
            </div>
        </nav>


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
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $('.favorite').on('click', function() {
        $(this).toggleClass('active');
    });
</script>
</body>

</html>

</body>
