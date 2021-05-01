<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- FAVICON -->
  <link href="{{asset('care/images/logo.jpg')}}" rel="shortcut icon">

  <link rel="stylesheet" href="{{asset('care/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('care/plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('care/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('care/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('care/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('care/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{asset('care/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href="{{asset('care/css/style.css')}}" rel="stylesheet">
@livewireStyles


</head>

<body class="body-wrapper">
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="{{ route('home.page') }}">
            <img style="height: 90px; width: 90px;" src="{{asset('care/images/logo.jpg')}}" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('page.path','home') }}">Accueil</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="{{ route('page.path','about') }}">A propos</a>
              </li>
               <li class="nav-item  dropdown dropdown-slide" >
                   <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Nos services
                </a>
                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('page.path','services') }}">Prestations de service</a>
                  <a class="dropdown-item" href="{{ route('page.path','houses') }}">Location de maison</a>
               
                </div>
               </li>
             
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('page.path','contact') }}">Contact</a>
              </li>
         
        

            </ul>
            <ul class="navbar-nav ml-auto mt-10">
             <li class="nav-item  dropdown dropdown-slide">
                @if (auth()->check())
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link login-button  bg-secondary text-white"  aria-haspopup="true" aria-expanded="false">
                  Deconnexion <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABh0lEQVRIS82V4U0CQRCFv8VE4mkiUwlYAVABdAAlQAXagXQgdIAVCBUIFWgHg4lAQuKdGdkjJ3DAoRg3uV83O29m3ts3jhMfd+L8/A+AuWolhIaDEsvPziiCUQ56FyKDtEns7OBdtZSDe6CyZ5SDENpXIqP1uFQAVS3k4RW4Bt4i6ETQj5MYuIO6g5aPmYRQXQfZ2cFctRlCZQEtEZls68IKOYeOgwawAfJrJE9Vux5kEIhU42JSAezCpUjzUBknR+qgGhO/AeADn0wtgUimDqeqdw5uI+jFxX1L4FVjyQtWeVYAf//ZJByI3FiOFYARGsHDoSOJ49aLmKlGyeL+DsBQfYv2Kk37PxnROBD5evFpJBtIMSsHe0lOzv9Imb6YQHbKNCvJcfxMtQ/UgGEgsvKuQ6yivID2LqvIL9VXN88ya0n60aFmN3HQ+YDHpNmdQS1amp29m43kW0lOjsirqgOU94xuGEIrk10nE/qF0/QLp+j/jf3C6R69cI4lPHkvk5kdA3hygE8dC7AZi8diCQAAAABJRU5ErkJggg=="/></span>
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                @else
                <a class="nav-link bg-primary text-white login-button"  aria-haspopup="true" aria-expanded="false">
                  Inscription<span><img style="height: auto;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABfklEQVRIS8WV0VHCQBCGv3tSwgvbgVagViB2gBUAFTBUIFQgViBWoFQgdEAHlrC8APLiOQeXmRAuuTDIeE+X5O7/d/9/d2M48zJnxqcSwVK1ZaAHNH1AUwPDmsg0FmCUYKk6NtAOAVkY1kUGZSSlBD7ydw/QN/Dh9j/QMfDk9gYeyjIpJVipOgnugX4iMspGulQdeJJZIpJKd5BMjMC6GxsQEVlkb69Vryx8uXeJSCHOvxNsJQqZmZFokoi0ioyubLIBVy1vHqhtd8+nmewAMpEeBHlymaaIa9Wmj9hVlFszl9GfNFqsU2PfCz1Q1cYl9Cw4A28LgOau+b7hJV/G6fkgwVq1Y+EZaMQi9N8XFrp1kW2nZ9cBgQd/9YcmBkZFWue9sfCYJ9kjcLJc7LqzYaBbExlXySBTaYsNXGfl2iOo2jwh0nRu5Ut3j2ClOgduYhMyRODl+gTmichd0OSV6na4lQ2vMslC9/MZnJegiqHHnon+Mo8FjPbBqYD5+79RUqUZooYQ/AAAAABJRU5ErkJggg=="/></span>
                </a>
                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('register.path','provider') }}">Prestataire</a>
                  <a class="dropdown-item" href="{{ route('register.path','canvasser') }}">Chasseur immobilier</a>
                  <a class="dropdown-item" href="{{ route('register.path','customer') }}">Client</a>
                </div>
                @endif

              </li>
            

              @if (auth()->user())
               <li class="nav-item ">
                  <a  class="nav-link login-button " href="{{ route('user.account.path')}}"  aria-haspopup="true" aria-expanded="false">Mon compte <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABN0lEQVRIS8WU/zFFMRBGz+uADqgAFaADKkAFRgWoABWgAlTw6EAHWtABc8zG3MlLbuI9l/3n/pjkO5vd/TJj4phNrE8v4AA4BfYioWfgEvA5Gj2AO+CooiLkYozQApj5QwicAY/xfgycx/v+2ElaAEuwCyh+nWVq5kJeBqVbOEwL8BE71oH3bPcG8Bb/qjr/DkglKjUzlegJsFfFaJ1g2GQF70PFqUrTs1KT1UuZljJceUyTqAYT5EQZTo7fv2K0llmXdvJaXA/2Ybui8hrmuymM8deWWpN16hUgpCf0yMnA6d97SgDFb2OFI6iDa7XOe3OYQ3KAGetOn2bkRdcTadI8yeawXDmgyzwVYtGUOcCmbQGj5qkALNccUGMnrckB6XJrObxWtoX9fw7oaeiP1ixbim7I5IBP9Lo9GWglB+QAAAAASUVORK5CYII="/></a></li>
                @else
                  {{-- false expr --}}
                <li class="nav-item dropdown dropdown-slide  ">
                <a  class="nav-link login-button text-white bg-success"  href="{{ route('login.path') }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABi0lEQVRIS82V/U3CUBTFfw8TCdVE7gZuIE4gTAAbUDeACXQDu4GwAW4AEwgT6AYXEoFAIjUPXglWaEsjxpf0r953zv0471zDiY85MT7/g2CuWl1B00CFzWfPMIRhAbolkf6hTiRW8KFaKcATUE1pZX8F7UuRYTzuIIGqlovwDlwBkxCCEHoRiCU30DDQcjHjFdTiJIkVzFX9FVSX0BKR8b4qbCLnEBhoAj9Ifm3IU9WOI+l7IrUomaMILMiFiH+okqilBmrR4I8imKmGVj0LqO1r2VT10cBDCN0okTwEtoC9A3Wqe7VJeCK3NnBL4LI76mEbuC+JdHYvRTieyBr77wiypL5T5cTKN675nRaNPJH1i88zg9ECqicZcgaZvgHl3DJNauNMtQfUgYEnsvWuxBbZjIFwCe0kqyjCM9CwnhWfzUGCueq1tePIyAwEn/Cya3ZnUA83ZlfeB546ZKeKALhLUdnAgF8Sse777WRSkVs4vls4Nw5h5BZOJ/fCyfI20mIyVZAGkvT/5ARf/yy8GRoDZFgAAAAASUVORK5CYII="/></a>
              
               @endif

              </li>
         
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>
