<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('care/images/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    @livewireStyles
</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
		<div class="header">
			<div class="header-left"> 
				<a href="index.html" class="logo logo-small">
					<img src="{{ asset('care/images/logo.jpg') }}" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>
			
			<ul class="nav user-menu">
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="https://ui-avatars.com/api/?background=random&name={{auth()->user()->firstname.'+'.auth()->user()->lastname}}" width="40">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{ route('customer.page','account') }}">Compte</a>
						<a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="{{ route('logout') }}">Deconnexion</a>
					</div>
					    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					      @csrf
					    </form>
				</li>
				<!-- /User Menu -->
				
			</ul>
		</div>
		<!-- /Header -->
		
		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-logo">
				<a href="{{ route('home.page') }}">
					<img src="{{ asset('care/images/logo.jpg') }}" class="img-fluid" alt="">
				</a>
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li>
							<a href="{{route('customer.page','index')}}"><i class="fas fa-home"></i> <span>Accueil</span></a>
						</li>
						
						<li>
							<a href="{{route('customer.page','history')}}"><i class="fas fa-book"></i> <span>Historiques des prestatations</span></a>
						</li>
						<li>
							<a href="{{route('customer.page','account')}}"><i class="fas fa-user"></i> <span>Mon compte</span></a>
						</li>
						<li>
							<a href="{{route('customer.page','testimony')}}"><i class="fas fa-pen"></i> <span>Temoigagner</span></a>
						</li>
					
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
		
		@yield('content')
	</div>

	<!-- jQuery -->
    @livewireScripts

	<script src="{{asset('assets/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('assets/js/admin.js')}}"></script>

</body>
</html>