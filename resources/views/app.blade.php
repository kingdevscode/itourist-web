
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>I-tourist</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/animate.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/bootstrap.min.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/line-awesome.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/line-awesome-font-awesome.min.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/font-awesome.min.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/jquery.mCustomScrollbar.min.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/lib/slick/slick.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/lib/slick/slick-theme.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/style.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ url('assets/css/responsive.css') }} ">
</head>


<body>


	<div class="wrapper">



		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.html" title=""><img src=" {{ url('assets/images/logon.png') }} " width="40px" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="index.html" title="">
									<span><img src=" {{ url('assets/images/icon1.png') }} " alt=""></span>
									Home
								</a>
							</li>
							<li>
								<a href="companies.html" title="">
									<span><img src=" {{ url('assets/images/icon2.png') }} " alt=""></span>
									Dashboard
								</a>
								<ul>
									<li><a href="companies.html" title="">Sites</a></li>
									<li><a href="companies.html" title="">Articles</a></li>
									<li><a href="company-profile.html" title="">Logements</a></li>
								</ul>
							</li>
                            @auth
                                <li>
								<a href="profiles.html" title="">
									<span><img src=" {{ url('assets/images/icon4.png') }} " alt=""></span>
									Guides
								</a>
								<ul>
									<li><a href="user-profile.html" title="">User Profile</a></li>
									<li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
								</ul>
							</li>
                            @endauth
							<li>
								<a href="#" title="" class="not-box-open">
									<span><img src=" {{ url('assets/images/icon7.png') }} " alt=""></span>
									Notifications
								</a>
								<div class="notification-box">
									<div class="nt-title">
										<h4>Setting</h4>
										<a href="#" title="">Clear all</a>
									</div>
									<div class="nott-list">
										<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src=" {{ url('assets/images/resources/ny-img1.png') }} " alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src=" {{ url('assets/images/resources/ny-img2.png') }} " alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('assets/images/resources/ny-img3.png') }} " alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('assets/images/resources/ny-img2.png') }} " alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="view-all-nots">
						  					<a href="#" title="">View All Notification</a>
						  				</div>
									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info">
							<img src="http://via.placeholder.com/30x30" alt="">
							<a href="#" title="">
                                Account
                            </a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss">
                            <ul class="us-links">
                                <li>
                                    @if (Auth::check())
                                        {{Auth::user()->email}}
                                    @else
                                        <a href="login">Sign in</a>
                                    @endif
                                </li>
                            </ul>
							<h3>Online Status</h3>
							<ul class="on-off-status">
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small>Online</small>
									</div>
								</li>
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label>
										<small>Offline</small>
									</div>
								</li>
							</ul>
							<h3>Setting</h3>
							<ul class="us-links">
								@auth
                                    <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                                @endauth
								<li><a href="#" title="">Terms & Conditions</a></li>
							</ul>
                            @auth
                                <form action="/logout" method="post">
                                    @csrf
                                    <h3 class="tc"><button type="submit" class="btn btn-outline-danger" title="">Logout</button></h3>
                                </form>
                            @endauth
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->

        <main>
            @yield('content')
        </main>

        <script type="text/javascript" src=" {{ url('assets/js/jquery.min.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/js/popper.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/js/bootstrap.min.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/js/jquery.mCustomScrollbar.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/lib/slick/slick.min.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/js/scrollbar.js') }} "></script>
        <script type="text/javascript" src=" {{ url('assets/js/script.js') }} "></script>

    </body>
</html>
