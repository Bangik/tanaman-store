@extends('layouts.user.app')

@section('title', 'Cart')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{asset($cart->plant->image)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{$cart->plant->name}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp. {{$cart->plant->price}}</p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0" value="{{$cart->quantity}}" data-id="{{$cart->id}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 total">Rp. {{$cart->plant->price * $cart->quantity}}</p>
                        </td>
                        <td>
                            <form action="{{route('cart.destroy', $cart->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                  <i class="fa fa-times text-danger"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row g-4 justify-content-end mt-5">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4" id="cart-total"></p>
                    </div>
                    <form action="{{route('transactions.user.store')}}" method="POST">
                        @csrf
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Proceed Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
@endsection

@push('scripts')
<script>
    function updateCartTotal() {
      var total = 0;
      $('.total').each(function() {
        total += parseFloat($(this).text().replace('Rp. ', ''));
      });
      $('#cart-total').text('Rp. ' + total);
    }

    function updateCart(id, quantity) {
      $.ajax({
        url: '/cart/' + id,
        type: 'PATCH',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          quantity: quantity
        },
        success: function(response) {
          updateCartTotal();
        }
      });
    }

    $(document).ready(function(){

      $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        var id = button.parent().parent().find('input').data('id');
        var total = button.parent().parent().parent().parent().find('.total');
        var price = button.parent().parent().parent().prev().find('p').text().replace('Rp. ', '');
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
            total.text('Rp. ' + (newVal * price));
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
                if (newVal == 0) {
                    newVal = 1;
                }
                total.text('Rp. ' + (newVal * price));
            } else {
                newVal = 1;
            }
        }
        button.parent().parent().find('input').val(newVal);
        updateCart(id, newVal);
      });

      // set cart total
      var total = 0;
      $('.total').each(function() {
        total += parseFloat($(this).text().replace('Rp. ', ''));
      });
      $('#cart-total').text('Rp. ' + total);

      $('.quantity input').on('change', function() {
        updateCartTotal();
      });
    });
</script>
@endpush