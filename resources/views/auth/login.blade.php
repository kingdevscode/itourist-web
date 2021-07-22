{{-- @extends('layouts.app')
@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ajouter') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@include('header')

<body style="height: 100%;">

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center h-100">
                <div class="col-md-6">
                    <div class="card-body" style="margin-bottom: 10%">
                        <div class="acc-setting">
                            <div class="card-header" style="background-color: #e44d3a; color: white">
                                <h3 class="col text-center">Connexion</h3>
                            </div>
                            <br>
                            <div class="row">
                                <img  class="rounded mx-auto d-block" src="{{url('assets/images/logon.png')}}" style="width: 100px;" alt="">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Adresse email incorrecte</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="password">Mot de de passe</label>
                                        <input id="password" type="password" place class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Mot de passe incorrecte</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="container">
                                    <div class="form-group row">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Rester connecter
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="container">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                        Connecter
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="card-footer" style="margin-bottom: 10%">
                                    <div class="d-flex justify-content-center links">
                                        N'avez-vous pas de compte ? <a href="{{ route('register') }}">Créer un compte</a>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <a href="#">Mot de passe oublié ?</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

