<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{config('app.name')}}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="{{asset('dist/bootstrap/css/bootstrap.min.css')}}">

<!-- Favicon -->
<link href="{{asset('care/images/logo.jpg')}}" rel="shortcut icon">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/et-line-font/et-line-font.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/simple-lineicon/simple-line-icons.css')}}">



</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="{{ route('admin.page','index') }}" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini">House Care></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg">House Care</span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="{{ route('admin.page','index') }}"></a> </li>
      </ul>
   
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
        
          </li>
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{asset('care/images/avatar-homme.jpeg')}}" class="user-image" alt="User Image"> <span class="hidden-xs">{{ auth()->user()->firstname}} {{auth()->user()->lastname}}  </span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="{{asset('care/images/avatar-homme.jpeg')}}" class="img-responsive img-circle" alt="User"></div>
                <p class="text-left">{{auth()->user()->firstname}} {{auth()->user()->lastname}}  <small>{{auth()->user()->email}} </small> </p>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i>Mon profit</a></li>
              <li role="separator" class="divider"></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Deconnexion</a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="{{asset('care/images/avatar-homme.jpeg')}}" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p>{{auth()->user()->firstname}} {{auth()->user()->lastname}} </p>
          <a href="#"><i class="fa fa-circle text-success"></i>enligne</a> </div>
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active treeview"> <a href="#"> <i class="icon-home"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        
        </li>

        <li class="treeview"> <a href="#"> <i class="icon-grid"></i> <span>Prestations</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.service.page','index') }}"><i class="fa fa-angle-right"></i> Domaines</a></li>
            <li><a href="{{ route('admin.service.page','prestation') }}"><i class="fa fa-angle-right"></i>Prestations</a></li>
            <li><a href="{{ route('admin.show.provider.proposal') }}"><i class="fa fa-angle-right"></i>Prestations suggerées</a></li>
            <li><a href="{{ route('admin.service.page','price') }}"><i class="fa fa-angle-right"></i>Proposition de prix</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="ti-email"></i> <span>Prestataires</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('provider.page','customer') }}"><i class="fa fa-angle-right"></i>Nos clients</a></li>
            <li><a href="{{ route('provider.page','canvasser') }}"><i class="fa fa-angle-right"></i>Chasseurs immobiliers</a></li>
            <li><a href="{{ route('provider.page','provider') }}"><i class="fa fa-angle-right"></i>Prestataires</a></li>
            <li><a href="{{ route('provider.page','disponible') }}"><i class="fa fa-angle-right"></i>Prestataires indisponible</a></li>
              <li><a href="{{ route('provider.page','provider-offline') }}"><i class="fa fa-angle-right"></i>Prestation en cours</a></li>
            <li><a href="{{ route('provider.page','piece-utilisateur') }}"><i class="fa fa-angle-right"></i>Validation des prestataires</a></li>
            <li><a href="{{ route('provider.page','proposal-provider') }}"><i class="fa fa-angle-right"></i>Prestataires suggerés</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="icon-note"></i> <span>Autres</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.other.page','contact') }}"><i class="fa fa-angle-right"></i>Messages envoyés</a></li>
            <li><a href="{{ route('admin.other.page','testimony') }}"><i class="fa fa-angle-right"></i>Temoignages</a></li>
            <li><a href="{{ route('admin.other.page','cities') }}"><i class="fa fa-angle-right"></i>Communes</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="icon-user"></i> <span>Profit</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-angle-right"></i>Les admnistrateurs</a></li>
          </ul>
        </li>
    
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>
  
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->

    
    <!-- Main content -->
 
    @yield('content')
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.0</div>
    Copyright © 2021 Faucon Digital. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="{{asset('dist/js/jquery.min.js')}}"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="{{asset('dist/bootstrap/js/bootstrap.min.js')}}"></script> 

<!-- template --> 
<script src="{{asset('dist/js/adminkit.js')}}"></script> 

<!-- Morris JavaScript --> 
<script src="{{asset('dist/plugins/raphael/raphael-min.js')}}"></script> 
<script src="{{asset('dist/plugins/morris/morris.js')}}"></script> 
<script src="{{asset('dist/plugins/functions/dashboard1.js')}}"></script> 

<!-- Chart Peity JavaScript --> 
<script src="{{asset('dist/plugins/peity/jquery.peity.min.js')}}"></script> 
<script src="{{asset('dist/plugins/functions/jquery.peity.init.j')}}s"></script>
</body>


</html>
