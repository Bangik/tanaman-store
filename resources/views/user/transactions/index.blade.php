@extends('layouts.user.app')

@section('title', 'Riwayat Transaksi')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Riwayat Transaksi</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Riwayat Transaksi</li>
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
                    <th scope="col">Invoice</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>
                            <p class="mb-0 mt-4">{{$transaction->invoice_number}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">Rp. {{$transaction->total}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$transaction->status}}</p>
                        </td>
                        <td>
                            <a href="{{route('transactions.user.show', $transaction->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>                            
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