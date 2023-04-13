@extends('master.navbar')
@section('link-style')
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

@endsection
@section('content')
    <div class="cont">
        <main>
            <div class="intro" style="background-image: url({{asset('assets/img/img2.jpg')}})">
                <h1>Location des objects</h1>
                <p>le premier site web de location des objets</p>
                @if(Auth::check())
                    <a href="#">Bienvenue</a>
                @else
                    <a href="/register">Rejoignez-nous</a>
                @endif
            </div>
            <div class="all-ads">
                @include("components.ads")
            </div>
            <div class="achievements">
                <div class="work">
                    <i class="fas fa-atom"></i>
                    <p class="work-heading">Securité</p>
                    <p class="work-text">la sécurité est notre priorité</p>
                </div>
                <div class="work">
                    <i class="fas fa-skiing"></i>
                    <p class="work-heading">Diversité</p>
                    <p class="work-text">différent objet en location.</p>
                </div>
                <div class="work">
                    <i class="fas fa-ethernet"></i>
                    <p class="work-heading">Communauté</p>
                    <p class="work-text">Une geande communauté</p>
                </div>
            </div>
            <div class="Annonce"></div>
            <div class="about-me">
                <div class="about-me-text">
                    <h2>Apropos locobjet</h2>
                    <p>La premiere application au maroc de location des objets, vous pouvez deposer des anonces qui concernent les objets que vous voulez louer ou bien se connecter pour louer un objet que vous souhaitez </p>
                </div>
                <img src="{{asset('assets/img/img1.jpg')}}" alt="me">
            </div>
        </main>
        <footer class="footer">
            <div class="copy"></div>
            <div class="bottom-links">
                <div class="links">
                    <span>More Info</span>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                </div>
                <div class="links">
                    <span>Social Links</span>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>

@endsection


