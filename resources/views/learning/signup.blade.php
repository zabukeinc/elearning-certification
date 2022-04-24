<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Pelatihan / E-Learning</title>
  <link rel="stylesheet" href="{{asset('assets-learning/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets-learning/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('assets-learning/css/regist.css')}}" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="cover-form">
      <img class="fixed-img" src="{{asset('assets-learning/img/1.png')}}" alt="" />
      <div class="label-cover">
        <a href="">
          <h3>Daftar Akun Baru</h3>
          <p>Silahkan daftar untuk memulai</p>
        </a>
      </div>
    </div>
    <form class="" action="{{route('auth.submit_register')}}" method="POST">
      @csrf
      <div class="form-content">
        <div class="signup-form">
          <div class="title">Sign Up</div>
          <div class="input-boxes">
            <div class="input-box">
              <label for="namaLogin">Full Name</label>
              <input type="text" placeholder="Full Name" required name="name" />
            </div>
            <div class="input-box">
              <label for="emailLogin">Email</label>
              <input type="email" placeholder="Email" required name="email" />
            </div>
            <div class="input-box">
              <label for="emailLogin">Phone Number</label>
              <input type="number" placeholder="Phone Number" required name="phone" />
            </div>
            <div class="input-box">
              <label for="emailLogin">Company Name</label>
              <input type="text" placeholder="Company Name" required name="company_name" />
            </div>
            <div class="input-box">
              <label for="passLogin">Password</label>
              <input type="password" placeholder="Password" required name="password" />
            </div>
            <div class="button input-box">
              <input type="submit" value="Sign Up" />
            </div>
            <div class="login-text">Already have an account? <a href="{{route('front.login-page')}}">Sign In</a></div>
          </div>
          @if (session('error'))
          <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
              {{ session('error') }}
            </div>
          </div>
          @endif
        </div>
      </div>
    </form>
  </div>
  @include('learning/html-footer')