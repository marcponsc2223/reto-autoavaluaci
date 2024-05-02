<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="../public/images/favicon.png" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid bg-dark">
          <a class="navbar-brand" href="./"><img src="../public/images/logo.png" alt="" width="200px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @if (Auth::check() && Auth::user()->rol->tipus == 'Administrador')
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dades mestres
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Tipus usuaris</a></li>
                    <li><a class="dropdown-item" href="{{ url('usuari')}}">Usuaris</a></li>
                    <li><a class="dropdown-item" href="{{ url('cicle') }}">Cicles</a></li>
                    <li><a class="dropdown-item" href="#">Mòduls</a></li>
                    <li><a class="dropdown-item" href="#">Assignar Professor</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">Assignar alumnes</a></li>
                    <li><a class="dropdown-item" href="#">Resultats aprenentatge</a></li>
                    <li><a class="dropdown-item" href="#">Criteris avaluació</a></li>
                  </ul>
                </li>   
              @elseif (Auth::check() && Auth::user()->rol->tipus == 'Professor')
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Professors
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Assignar alumnes</a></li>
                      <li><a class="dropdown-item" href="#">Resultats aprenentatge</a></li>
                      <li><a class="dropdown-item" href="#">Criteris avaluació</a></li>
                      <hr>
                      <li><a class="dropdown-item" href="{{ url('autoavaluacio') }}">Autoavaluació alumnes</a></li>
                    </ul>
                  </li>
                </ul>
              @elseif(Auth::check() && Auth::user()->rol->tipus == 'Alumne')
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Alumnes 
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ url('autoavaluacio') }}">Autoavaluació</a></li>
                    </ul>
                  </li>
                </ul>
              @endif 
            </ul>
          </div>
        <form role="search" class="text-light">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
            @if (Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->nom}} {{Auth::user()->cognom}}
                </a>
                <div class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/logout') }}"><i>Logout</i></a>
                </div>
                {{-- <li><a class="dropdown-item text-light" href="{{ url('/logout') }}">Logout</a></li> --}}
              </li>
            @else
              <ul>
                <li><a class="dropdown-item text-light" href="{{ url('/login') }}">Login</a></li>
              </ul>
            @endif
          </ul>
        </form>
          {{-- <p class="text-light">Marc Pons</p> --}}
        </div>
        
      </nav>
      <div class="container">
        @yield('content')
      </div>
</body>
</html>