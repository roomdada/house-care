<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('care/images/logo.jpg')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    @livewireStyles
</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
		<div class="header">
			<div class="header-left"> 
				<a href="{{ route('home.page') }}" class="logo logo-small">
					<img src="{{asset('care/images/logo.jpg')}}" alt="Logo" width="30" height="30">
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
						<a class="dropdown-item" href="{{ route('provider.page.path','home') }}">Mon compte</a>
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
			@if(auth()->user()->admin_validation)
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li>
							<a href="{{route('provider.page.path','home')}}"><i class="fas fa-home"></i> <span>Accueil</span></a>
						</li>
						<li>
							<a href="{{route('provider.page.path','service')}}"><i class="fas fa-bicycle"></i> <span>Mes prestations</span></a>
						</li>
						<li>
							<a href="{{route('provider.page.path','history')}}"><i class="fas fa-book"></i> <span>Historiques</span></a>
						</li>
						@if(auth()->user()->disponible)
						<li>
							<a href="{{ route('provider.status') }}"><i class="fas fa-check"></i> <span>Mode indisponible</span></a>
						</li>
						 @else
						 <li>
							<a class="text-success" href="{{ route('provider.status') }}"><i class="fas fa-check"></i> <span>Mode disponible</span></a>
						</li>
						@endif
						
						
						<li>
							<a href="{{route('provider.page.path','account')}}"><i class="fas fa-user"></i> <span>Mon compte</span></a>
						</li>
						<li>
							<a href="{{route('provider.page.path','testimony')}}"><i class="fas fa-pen"></i> <span>Temoigagner</span></a>
						</li>
					</ul>
				</div>
			</div>
			@endif
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