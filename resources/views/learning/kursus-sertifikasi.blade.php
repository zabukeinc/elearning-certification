@include('learning/html-header')
<section class="kelas-content">
  <div class="container">
    <div class="head-content">
      <div class="">
        <div class="text-center col-md-12">
          <h3>KURSUS DAN SERTIFIKASI</h3>
        </div>
      </div>
    </div>
    <div class="my-4 body-content">
      <div class="row 1">
        <!-- Form -->
        <!-- Select Box -->
        @forelse ($datas as $data)
        <div class="content-kelas">
          <form action="{{ route('front.cart') }}" method="POST">
            @csrf
            <div class="">
              <img src="{{asset('assets-learning/img/kelas1.jpg')}}" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="text-center card-title">{{$data->name}}</h5>
              </div>
              <p class="card-text">Rp. {{$data->price}}</p>
              <input type="hidden" name="product_id" value="{{ $data->id }}" class="form-control">
              <button class="btn essence-btn button-ikutkelas">Add to cart</button>
            </div>
          </form>
        </div>
        @empty
        <tr>
          <td colspan="5" class="text-center">Tidak ada data</td>
        </tr>
        @endforelse
      </div>
    </div>
  </div>
</section>
@include('learning/html-footer')