@include('learning/html-header')
<section class="cart-content">
  <div class="container">
    <div class="cart-content">
      <div class="tabel-cart">
        <table class="table">
          <thead class="tabel-head">
            <tr class="text-center">
              <th scope="col" class="col-md-6">PRODUK</th>
              <th scope="col" class="col-md-2">HARGA</th>
              <th scope="col" class="col-md-1">JUMLAH</th>
              <th scope="col" class="col-md-2">SUBTOTAL</th>
              <th scope="col" class="col-md-2"></th>
            </tr>
          </thead>
          <tbody class="tabel-body">
            @forelse ($carts_item as $cart)
            <tr>
              <th scope="row" class="produk-name">
                {{$cart['product_name']}}
              </th>
              <td>Rp. {{$cart['product_price']}}</td>
              <td>{{$cart['qty']}}</td>
              <td>{{$cart['product_price'] * $cart['qty']}}</td>
              <td>
                <form action="{{ route('front.remove_cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $cart['product_id'] }}" class="form-control">
                  <button class="btn">
                    <i class="bx bx-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">
                <h4>Cart is empty</h4>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="checkout-cart">
        <div class="row col-md-4 offset-8">
          <div class="cart-header">
            <h6 class="m-0 text-center">Total Keranjang Belanja</h6>
          </div>
          <div class="cart-body">
            <div class="cart-subtotal">
              <h6>Subtotal</h6>
              <span>Rp.{{$carts_subtotal ?? 0}}</span>
            </div>
            <div class="cart-total">
              <h6>Total</h6>
              <span>Rp. {{$carts_subtotal ?? 0}}</span>
            </div>
          </div>
          <button class="button-checkout" id="pay-button">Lanjutkan ke Chechout</button>
        </div>
      </div>
      <form id="payment-form" method="post" action="snapfinish">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="result_type" id="result-type" value="">
    </div>
    <input type="hidden" name="result_data" id="result-data" value="">
  </div>
  </form>
  </div>
  </div>
</section>


@include('learning/html-footer')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-AEFImi1U64xEy3QG"></script>

<script type="text/javascript">
  $('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    $.ajax({
      url: './snaptoken',
      cache: false,
      success: function(data) {
        console.log('token = ' + data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type, data) {
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
        }
        snap.pay(data, {
          onSuccess: function(result) {
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result) {
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>