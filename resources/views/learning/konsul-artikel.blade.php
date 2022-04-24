@include('learning/html-header')
<section class="artikel-content">
  <div class="container">
    <div class="head-content">
      <div class="">
        <div class="text-center col-md-12">
          <h3>Artikel</h3>
        </div>
      </div>
    </div>
    <div class="my-4 body-artikel">
      <div class="row 1">
        @forelse($artikels as $artikel)
        <div class="content-artikel">
          <div class="">
            <img src="{{asset('articles/' . $artikel->image)}}" class="card-img-top" alt="{{$artikel->name}}" />
            <div class="card-body">
              <h5 class="text-center card-title">{{$artikel->name}}</h5>
              <p class="card-text">{{!!$artikel->description!!}}</p>
            </div>
            <a href="" class=""><button class="button-ikutkelas">Read More</button></a>
          </div>
        </div>
        @empty
        @endforelse
      </div>
    </div>
  </div>
  </div>
</section>
@include('learning/html-footer')