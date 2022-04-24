@include('learning/html-header')
<section class="kelas-content">
  <div class="container">
    <div class="head-content">
      <div class="">
        <div class="text-center col-md-12">
          <h3>Free E-Learning</h3>
        </div>
      </div>
    </div>
    <div class="my-4 body-content">
      <div class="row 1">
        @forelse ($datas as $data)
        <div class="content-kelas">
          <div class="">
            <img src="{{asset('assets-learning/img/content1.jpg')}}" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="text-center card-title">{{$data->name}}</h5>
            </div>
            <a href="detail-elearning.html" class=""><button class="button-ikutkelas">Mulai Gratis</button></a>
          </div>
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