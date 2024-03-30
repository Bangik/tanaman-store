@extends('layouts.user.app')

@section('title', 'Tanaman')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Tanaman</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Tanaman</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
      <h1 class="mb-4">Belanja Tanaman</h1>
      <div class="row g-4">
          <div class="col-lg-12">
            <div class="row g-4 justify-content-center">
              @foreach ($plants as $plant)
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                            <img src="{{asset($plant->image)}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                            <h4>{{$plant->name}}</h4>
                            <p>{{$plant->description}}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">Rp. {{$plant->price}}</p>
                                <a href="{{route('cart.add', $plant->id)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
      </div>
    </div>
</div>
<!-- Cart Page End -->
@endsection