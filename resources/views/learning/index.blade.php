@include('learning/html-header')
  <!--HERO-->
  <section class="hero">
    <div class="container h-100">
      <div class="row h-100">
        <div class="my-auto hero-title col-md-6">
          <h1>Temukan Bakat Kreatifmu Disini!</h1>
          <p>Ayo Semangat dan Jangan Menyerah!</p>
          <button class="button-lg-primary">Lihat Kelas</button>
        </div>
      </div>
    </div>
    <div id="carouselExampleIndicators" class="top-0 carousel slide carousel-fade position-absolute fixed-top" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('assets-learning/img/1.png')}}" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="{{asset('assets-learning/img/2.png')}}" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="{{asset('assets-learning/img/3.png')}}" class="d-block w-100" alt="..." />
        </div>
      </div>
    </div>
  </section>

  <!--Profile Content-->
  <section class="profile">
    <div class="container">
      <div class="my-5 row">
        <div class="text-center col-md-12">
          <h1>PROFILE</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img width="500px" src="{{asset('assets-learning/img/1.png')}}" height="" alt="" />
        </div>
        <div class="col-md-6">
          <h3 class="text-center">Kami Adalah</h3>
          <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto voluptates laboriosam cupiditate et quia corrupti consequuntur dicta tempore ipsa veritatis accusamus, adipisci in nesciunt vel voluptatum? Deserunt deleniti repudiandae neque.</p>
        </div>
      </div>
    </div>
  </section>

  <!--Card Creator-->
  <section class="creator">
    <div class="container">
      <div class="my-5 row">
        <div class="text-center col-md-12">
          <h1>KATA MEREKA</h1>
        </div>
      </div>
      <div class="head-card">
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="my-5 body-card">
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card">
          <img src="{{asset('assets-learning/img/4.jpg')}}" class="mx-auto card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="text-center">Aghoes Kuncoro</h4>
            <p class="text-center card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('learning/html-footer')