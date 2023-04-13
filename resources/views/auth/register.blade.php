@extends('master.navbar')
@section("content")
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url({{asset('images/img2.jpg')}}); background-size:cover; "></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="color:orangered !important;">Inscrivez-vous maintenant!</h4>
                                </div>
                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf
                                    <div class="mb-3"><input class="form-control form-control-user @error('username') is-invalid @enderror" type="text" id="exampleInputEmail"  placeholder="nom d'utilisateur..." name="username" value="{{ old('username') }}" required autocomplete="username" /></div>
                                    @error('username')

                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('l_name') is-invalid @enderror" type="text" id="" placeholder="Nom" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" /></div>
                                    @error('l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('f_name') is-invalid @enderror" type="text" id="exampleInputEmail"  placeholder="Prenom..." name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" /></div>
                                    @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="exampleInputEmail" placeholder="Adresse email" name="email" value="{{ old('email') }}"  required autocomplete="email" /></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="exampleInputPassword" placeholder="mot de passe.." name="password" value="{{ old('password') }}" required autocomplete="new-password" /></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="mb-3"><input class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" type="password" id="exampleInputPassword" placeholder="confirmer votre mot de passe.." name="password_confirmation" value="{{ old('password_confirmation') }}"required autocomplete="new-password" /></div>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit" style="background-color: orangered !important; border: orangered">S'inscrire</button>
                                </form>
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


@endsection

