<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Pelatihan</title>
  <link rel="stylesheet" href="{{asset('assets-learning/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets-learning/css/style.css')}}" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('front.index')}}">Web Pelatihan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="mx-1 nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('front.index')}}">Home</a>
          </li>
          <li class="mx-1 nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelatihan </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('front.kursus-sertifikasi')}}">Kursus dan Sertifikasi</a></li>
              <li><a class="dropdown-item" href="{{route('front.kursus-on-demand')}}">On Demand</a></li>
              <li><a class="dropdown-item" href="{{route('front.kursus-gratis')}}">Free E-Learning</a></li>
            </ul>
          </li>
          <li class="mx-1 nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Konsultasi</a>
            <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Setting Dokumen K3L</a></li>
              <li><a class="dropdown-item" href="{{route('front.konsul-csms')}}">CSMS</a></li>
              <li><a class="dropdown-item" href="#">Prakerja</a></li>
              <li><a class="dropdown-item" href="{{route('front.konsul-artikel')}}">Artikel</a></li>
            </ul>
          </li>
          <li class="mx-1 nav-item">
            <a class="nav-link" aria-current="page" href="{{route('front.pusat-standar')}}">Pusat Standar</a>
          </li>
        </ul>
        <div class="button-nav d-flex">
          @if( auth()->check())
          <button class="mx-2 button-daftar"><a href="{{route('auth.user-logout')}}">Logout</a></button>
          @else
          <button class="mx-2 button-daftar"><a href="{{route('front.login-page')}}">Masuk</a></button>
          @endif
          <button class="button-chart">
            <a href="{{route('front.cart')}}"><i class="bx bxs-shopping-bag"></i></a>
            <span style="float:left; color: #FFF">{{ $carts_total_qty ?? 0 }}</span>
          </button>
        </div>
      </div>
    </div>
  </nav>