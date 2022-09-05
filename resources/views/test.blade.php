@extends('layouts.app')

@section('content')

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Rabbit Farm</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <p>logout</p>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @yield('active_dashboard')" aria-current="page" href="#">
              <i class="far fa-home-alt"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('active_product')" href="#">
              <i class="far fa-plus-circle"></i>
              Tambah produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('active_report')" href="#">
              <i class="far fa-file-chart-line"></i>
              Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('active_profile')" href="#">
              <i class="far fa-user-alt"></i>
              Profil toko
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>

@endsection