@extends('layouts.user.app')

@section('title', 'Detail Transaksi')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Detail Transaksi</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('landing')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('transactions.user.index')}}">History Transaksi</a></li>
        <li class="breadcrumb-item active text-white">Detail Transaksi</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mb-4">
            <h4>Invoice: {{$transaction->invoice_number}}</h4>
            <h4>Total: Rp. {{$transaction->total}}</h4>
            <h4>Status: {{$transaction->status}}</h4>
            @if ($transaction->status == 'PENDING')
              <form action="{{route('transactions.user.upload', $transaction->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="transfer_proof" id="transfer_proof">
                  <button type="submit" class="btn btn-success">Upload Bukti Transfer</button>
              </form>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->detailTransactions as $detailTransaction)
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{asset($detailTransaction->plant->image)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{$detailTransaction->plant->name}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp. {{$detailTransaction->plant->price}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$detailTransaction->quantity}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp. {{$detailTransaction->sub_total}}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart Page End -->
@endsection