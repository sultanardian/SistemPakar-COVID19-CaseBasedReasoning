<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Pakar COVID-19</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style-admin.css') }}" type="text/css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <!-- @include('layouts.navbar') -->        

        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin Sistem Pakar COVID-19 </a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <main>

            <div class="container-fluid">
              <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                  <div class="position-sticky pt-3">
                    <ul class="nav flex-column">

                      <li class="nav-item">
                        <a class="nav-link @yield('dashboard-active')" aria-current="page" href="{{ url('/') }}">
                          <i class="far fa-home-alt"></i>
                          Dashboard
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link @yield('symptoms-active')" href="{{ route('symptom.index') }}">
                          <i class="far fa-plus-circle"></i>
                          Gejala
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link @yield('respondent-active')" href="{{ route('respondent.index') }}">
                          <i class="far fa-file-chart-line"></i>
                          Responden
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="far fa-sign-out-alt"></i>
                          Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </li>

                    </ul>
                  </div>
                </nav>

                @yield('main')

              </div>
            </div>

        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/sidebar-admin.js') }}"></script>

</body>
</html>