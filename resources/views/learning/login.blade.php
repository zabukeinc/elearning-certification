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
      <img class="fixed-img" src="{{asset('assets-learning/img/2.png')}}" alt="" />
      <div class="label-cover">
        <a href="index.html">
          <h3>Selamat Datang</h3>
          <p>Masukan Akun Anda</p>
        </a>
      </div>
    </div>
    <form class="" action="{{route('auth.submit_login')}}" method="POST">
      @csrf
      <div class="form-content">
        <div class="signup-form">
          <div class="title">Sign In</div>
          <div class="input-boxes">
            <div class="input-box">
              <label for="emailLogin">Email</label>
              <input type="email" placeholder="Email" required name="email" />
            </div>
            <div class="input-box">
              <label for="passLogin">Password</label>
              <input type="password" placeholder="Password" required name="password" />
            </div>
            <div class="text-forget text-end">
              <a href="">Forget Password?</a>
            </div>
            <div class="button input-box">
              <input type="submit" value="Sign In" />
            </div>
            <div class="login-text">
              Don'thave an account? <a href="{{route('front.signup-page')}}">Sign Up</a>
            </div>
          </div>
          <!--<hr />
							<div class="sosmed-label text-center">Or Sign In with:</div>
						<div class="icon-sosmed">
							<a href=""><img src="img/fb-logo.png" alt="" /></a>
							<a href=""><img src="img/gmail-logo.png" alt="" /></a>
						</div>
					-->
        </div>
      </div>
    </form>
  </div>

  @include('learning/html-footer')