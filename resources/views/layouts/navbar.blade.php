<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">SISTEM PAKAR COVID-19</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">

          <li class="nav-item">
            <a class="nav-link @yield('beranda-active')" href="{{ url('/') }}">Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @yield('informasi-active')" href="{{ url('symptom_information') }}">Informasi Gejala</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @yield('diagnosis-active')" href="{{ route('diagnosis.index') }}">Cek Diagnosis</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @yield('admin-active')" href="{{ route('admin_login') }}">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>