@include('header')

<body style="height: 100%;">

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center h-100">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="acc-setting">
                            <div class="card-header" style="background-color: #e44d3a; color: white">
                                <h3 class="col text-center">Register</h3>
                            </div>
                            <br>
                            <div class="row">
                                <img  class="rounded mx-auto d-block" src="{{url('assets/images/logon.png')}}" style="width: 100px;" alt="">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid
                                        @enderror" name="Email" required autocomplete="current-email">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <input name="remenber" type="checkbox">Rester connecter
                                    </div>
                                </div>
                                <br>
                                <div class="container">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary">
                                        Login
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-center links">
                                        N'avez-vous pas de compte?<a href="{{ route('register') }}">Sign Up</a>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <a href="#">Mot de passe oublié?</a>
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
