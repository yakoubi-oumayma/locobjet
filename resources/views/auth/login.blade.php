@extends('master.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset("assets/fonts/fontawesome-all.min.css")}}">
</head>

<body class="bg-gradient-primary">
<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url({{asset('images/img2.jpg')}}); background-size: cover; margin-left: -100px"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="color:orangered !important;">Bienvenue!</h4>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="mb-3"><input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrer votre adresse email..." name="email"></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="exampleInputPassword" placeholder="Mot de passe" name="password"></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small">
                                            <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Se souvernir de moi</label></div>
                                        </div>

                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background-color: orangered !important; border: orangered">Se connecter</button>
                                    <br>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html" style="color: orangered">Mot de passe oublier?</a></div>
                                <div class="text-center"><a class="small" href="register.html" style="color: orangered">Créer un compte!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/theme.js")}}"></script>
</body>

</html>



@endsection













