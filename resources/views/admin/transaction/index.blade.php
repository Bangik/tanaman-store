@extends('layouts.admin.app')

@section('title', 'Transaksi')

@section('content')
<div class="section-header">
  <h1>Transaksi</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Transaksi</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Transaksi</h2>
  <p class="section-lead">
    Manajemen data Transaksi.
  </p>

  @if(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif

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
                  <th>INV</th>
                  <th>Pembeli</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach($transactions as $transaction)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$transaction->invoice_number}}</td>
                  <td>{{$transaction->user->name}}</td>
                  <td>{{$transaction->status}}</td>
                  <td>
                    <a href="{{route('transactions.show', $transaction->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
                    <form action="{{route('transactions.destroy', $transaction->id)}}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
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