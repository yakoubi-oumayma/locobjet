@extends('master.navbar')
@section("link-style")
    <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection
@section('content')

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" class="login" action="{{ route('login') }}">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" type="email" class="login__input  @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" type="password"
                               class="login__input @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password" placeholder="Mot de passe">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Se sevenir de moi') }}
                        </label>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <br>
                    <br>
                    @if (Route::has('password.request'))
                        <center><a class="qust" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublier?') }}

                            </a>
                        </center>
                    @endif


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
