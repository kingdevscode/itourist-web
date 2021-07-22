
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
                                                    <strong>Nom incorrect</strong>
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Adresse email incorrecte</strong>
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
                                            <input id="prenom" type="text" placeholder="Veillez entrer votre prenom" class="form-control @error('prenom') is-invalid
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
                                                    <strong>Téléphone incorrect</strong>
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
                                            <input id="password" type="password" place class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Mot de passe incorrecte</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="container">
                                            <label for="password2">Confirmation du mot de passe
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="password" name="password2" placeholder="Password" class="form-control @error('password2') is-invalid @enderror" name="password2" autocomplete="current-password2">

                                            @error('password2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Mot de passe incorrecte</strong>
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
                                            <input id="profile" type="file" class="form-control @error('file') is-invalid @enderror" name="file" autocomplete="current-file">

                                            @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Format de fichier incorrecte</strong>
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
