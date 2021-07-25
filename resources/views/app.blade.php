<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<title>Itourist</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/line-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/line-awesome-font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/lib/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/lib/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/sweetalert2.css') }}">
</head>


<body>


	<div class="wrapper">



		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="{{url('/home')}}" title=""><img src="{{ url('assets/images/logon.png') }}" style="width:40px;" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form action="{{url('/search-all')}}">
                            @csrf
							<input type="text" name="search" value="@if(isset($search)){{$search}}@endif" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="{{url('/home')}}" title="">
									<span><img src="{{ url('assets/images/icon1.png') }}" alt=""></span>
									Home
								</a>
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info">
                            <span class="la">
                                <img src="{{url(Auth::user()->profile)}}" style="width: 40px; height:40px;" class="user-avatar-nav" alt="">
                            </span>
						</div>
						<div class="user-account-settingss">
							<h3 class="widget widget-about">
                                @if (Auth::check())
                                <div class="sign_link">
                                   <label>
                                        {{Auth::user()->email}}
                                    </label>
                                    <a href="{{url('users/'. Auth::user()->id)}}" title="">Informations personnelles</a>
                                </div>
                                <div class="la">
                                    <img src="{{url(Auth::user()->profile)}}"
                                    style="
                                    width: 150px;
                                    height: 150px;
                                    clip-path:ellipse(50% 50%);
                                    ">
                                </div>
                                @else
<<<<<<< HEAD
                                    <a href="Login">Connexion</a> ou <a href="register">Enregistrement</a>
=======
                                    <a href="{{route('login')}}">Se connecter</a> ou <a href="{{route('register')}}">S'enregistrer</a>
>>>>>>> bmis
                                @endif
                            </h3>
							<h3 class="tc"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                            </a></h3>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->

		<main>
            @yield('content')
		</main>

	</div><!--theme-layout end-->



<script type="text/javascript" src=" {{ url('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/popper.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/scrollbar.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/script.js') }}"></script>
<script type="text/javascript" src=" {{ url('assets/js/sweetalert2.all.min.js') }} "></script>

</body>
</html>
