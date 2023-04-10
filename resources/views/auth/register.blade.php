@extends('master.navbar')
@section('link-style')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" class="login" action="{{ route('register') }}">
                    @csrf

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="username" type="text" class="login__input @error('name') is-invalid @enderror"
                            type="text" placeholder="Nom d'utilisateur" name="username" value="{{ old('username') }}"
                            required autocomplete="username" />
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="f_name" type="text" class="login__input @error('f_name') is-invalid @enderror"
                            type="text" placeholder="Prenom" name="f_name" value="{{ old('f_name') }}" required
                            autocomplete="f_name" />
                        @error('f_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="l_name" type="text" class="login__input @error('l_name') is-invalid @enderror"
                            type="text" placeholder="Nom" name="l_name" value="{{ old('l_name') }}" required
                            autocomplete="l_name" />
                        @error('l_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" type="email" class="login__input @error('email') is-invalid @enderror"
                            type="email" placeholder="Email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <input id="password" type="password" class="login__input @error('password') is-invalid @enderror"
                            type="password" placeholder="Mot de passe" name="password" required
                            autocomplete="new-password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="password-confirm" name="password_confirmation" required autocomplete="new-password"
                            class="login__input" type="password" placeholder="Confirmer mot de passe" />
                    </div>
                    <br>
                    <button type="submit" class="button login_submit"> <span class="button_text">S'inscrire</span>
                        <i class="button__icon fas fa-chevron-right"></i></button>
                    <br>


                    <center><a class="qust" href="/login">Vous avez deja un compte?</a></center>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen_backgroundshape screenbackground_shape4"></span>
                <span class="screen_backgroundshape screenbackground_shape3"></span>
                <span class="screen_backgroundshape screenbackground_shape2"></span>
                <span class="screen_backgroundshape screenbackground_shape1"></span>
            </div>
        </div>
    </div>
@endsection
