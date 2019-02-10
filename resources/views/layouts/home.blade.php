<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Silamo</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('templatehome/css/style.css')}}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    @stack('css')
</head>
<body>
  <section>
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="{{ route('home') }}"><img id="logoHeader" src="{{asset('templatehome/Mark1.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">News!</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('household') }}">Household</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gizmoz') }}">Gizmoz</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('kawa') }}">Kawa</a>
                    </li>
            </ul>
            <ul class="navbar-nav mr-0">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}"><img id="loginNavbar" src="{{asset('templatehome/loginIcon.png')}}" alt=""> Login</a>
                    </li>
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.index') }}"><img id="loginNavbar" src="{{asset('templatehome/shopIcon.png')}}" alt=""></a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="loginNavbar" src="{{asset('templatehome/loginIcon.png')}}" alt=""> {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profil</a>
                    @if (auth()->user()->isAdmin == 1)
                    <a class="dropdown-item" href="{{ route('homeadmin') }}">Masuk Admin</a>   
                    @endif
                    <a class="dropdown-item" 
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                  
                </li>
            @endguest
              </ul>
          </div>
        </nav>
      </section>
      
          @yield('content')
    
    <section id="footer" class="text-center">
      <div class="row align-items-center justify-content-md-center">
        <div class="col-md-2">
          <a href="http://">Site Map</a>
        </div>
        <div class="col-md-4">
        <div class="col">
            <a href=""><img id="logoFooter" src="{{asset('templatehome/Mark2.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href=""><img id="socialMedia" class="center-block" src="{{asset('templatehome/facebookIcon.png')}}" alt=""></a>
            <a href=""><img id="socialMedia" class="center-block" src="{{asset('templatehome/instagramIcon.png')}}" alt=""></a>
            <a href=""><img id="socialMedia" class="center-block" src="{{asset('templatehome/pinterestIcon.png')}}" alt=""></a>
        </div>
        <div class="col">
            <div class="copyright">© 2019 Copyright:<a href="#"> WebDev</a>
            </div>
        </div>
      </div>
        <div class="col-md-2">
          <a href="http://">Contact Us </a>
        </div>
      </div>
    </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @stack('js')
</body>
</html>
