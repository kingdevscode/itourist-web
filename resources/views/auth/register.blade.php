{{-- @extends('layouts.app')
@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


 --}}




@include('header')

<body style="height: 100%;">

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center h-100">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="acc-setting">
                            <div class="card-header" style="background-color: #e44d3a; color: white">
                                <h3 class="col text-center">Création du compte</h3>
                            </div>
                            <br>
                            <div class="row">
                                <img  class="rounded mx-auto d-block" src="{{url('assets/images/logon.png')}}" style="width: 100px;" alt="">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="nom">Nom
                                                <span style="color: red">*</span>
                                            </label>
                                            <input id="nom" type="text" placeholder="Veillez entrez votre nom"  class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" autocomplete="nom" autofocus>
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="email">Email
                                                <span style="color: red">*</span>
                                            </label>
                                            <input id="email" type="email" placeholder="Veillez entrer votre adresse email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="prenom">Prenom</label>
                                            <input id="prenom" type="text" placeholder="Veillez entrer votre prenom"  value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid
                                            @enderror" name="prenom" autocomplete="current-prenom">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="telephone">Téléphone
                                                <span style="color: red">*</span>
                                            </label>
                                            <input id="tel" type="text" placeholder="Veillez entrer votre nmero de téléphone" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autocomplete="tel" autofocus>
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="password">Mot de de passe
                                                <span style="color: red">*</span>
                                            </label>
                                            <input id="password" type="password" value="{{ old('password') }}" placeholder="Veillez entrer votre mot de passe"
                                            class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="password-confirm">Confirmation du mot de passe
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="password" value="{{ old('password-confirm') }}" name="password-confirm" placeholder="Veillez confirmer votre mot de passe" class="form-control @error('password-confirm') is-invalid @enderror" autocomplete="current-password-confirm">

                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="orm-group col-md-12">
                                        <div class="container">
                                            <label for="profile">Profile</label>
                                            <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" autocomplete="current-profile">

                                            @error('profile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="orm-group col-md-12">
                                        <div class="container">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">
                                                    Enregister
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-center links">
                                       J'ai déja un compte ? <a href="{{ route('login') }}">Connexion</a>
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

