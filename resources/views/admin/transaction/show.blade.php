@extends('layouts.admin.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="section-header">
  <h1>Detail Transaksi</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{route('transactions.index')}}">Transaksi</a></div>
    <div class="breadcrumb-item">Detail Transaksi</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Detail Transaksi</h2>
  <p class="section-lead">
    Manajemen data Detail Transaksi.
  </p>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Invoice</th>
                <td>{{$transaction->invoice_number}}</td>
              </tr>
              <tr>
                <th>Pembeli</th>
                <td>{{$transaction->user->name}}</td>
              </tr>
              <tr>
                <th>Total</th>
                <td>Rp. {{$transaction->total}}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>{{$transaction->status}}</td>
              </tr>
              <tr>
                <th>Bukti Transfer</th>
                <td><img src="{{asset($transaction->payment_image)}}" alt="" width="100"></td>
              </tr>
              <tr>
                <th>Ubah Status</th>
                <td>
                  <form action="{{route('transactions.update', $transaction->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <select name="status" class="form-control">
                        <option value="PENDING" {{$transaction->status == 'PENDING' ? 'selected' : ''}}>PENDING</option>
                        <option value="PROCESSING" {{$transaction->status == 'PROCESSING' ? 'selected' : ''}}>PROCESSING</option>
                        <option value="SUCCESS" {{$transaction->status == 'SUCCESS' ? 'selected' : ''}}>SUCCESS</option>
                        <option value="FAILED" {{$transaction->status == 'FAILED' ? 'selected' : ''}}>FAILED</option>
                      </select>
                    </div>
                    <button class="btn btn-primary">Ubah Status</button>
                  </form>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach($transaction->detailTransactions as $detailTransaction)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$detailTransaction->plant->name}}</td>
                  <td>Rp. {{$detailTransaction->plant->price}}</td>
                  <td>{{$detailTransaction->quantity}}</td>
                  <td>Rp. {{$detailTransaction->sub_total}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('libraries-style')
<link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endpush

@push('libraries-script')
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#table-1').DataTable();
  });
</script>
@endpush