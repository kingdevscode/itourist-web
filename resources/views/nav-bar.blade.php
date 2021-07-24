@extends('layouts.app')
@extends('app')

@section('content')


	<div class="wrapper">


		<section class="profile-account-setting">
			<div class="container">
				<div class="account-tabs-setting">
					<div class="row">
						<div class="col-lg-3">
							<div class="acc-leftbar">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-user"></i>Mon compte</a>
								    <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-info-circle"></i>Actualité</a>
								    <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-line-chart"></i>Activités</a>
								    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-bell"></i>Notifications</a>
								    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-envelope-square"></i>Messages</a>
								    <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false"><i class="fa fa-address-card"></i>Contacts</a>
								    <a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#security-login" role="tab" aria-controls="security-login" aria-selected="false"><i class="fas fa-friends-user"></i>Invitation</a>
								    <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false"><i class="fas fa-toolbook"></i>Programmes</a>
								    <a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fas fa-edit-user"></i>Modifier le profile</a>
								    <a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fa fa-cog"></i>Paramètres</a>
								  </div>
							</div><!--acc-leftbar end-->
						</div>
					</div>
				</div><!--account-tabs-setting end-->
			</div>
		</section>



		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="#" title="">Help Center</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="#" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
					<img class="fl-rgt" src="images/logo2.png" alt="">
				</div>
			</div>
		</footer>

	</div><!--theme-layout end-->

@endsection
