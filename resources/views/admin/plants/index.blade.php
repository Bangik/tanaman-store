@extends('layouts.admin.app')

@section('title', 'Tanaman')

@section('content')
<div class="section-header">
  <h1>Tanaman</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Tanaman</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Tanaman</h2>
  <p class="section-lead">
    Manajemen data Tanaman.
  </p>

  @if(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('plants.create')}}" class="btn btn-primary mb-3">Tambah Tanaman</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach($plants as $plant)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$plant->name}}</td>
                  <td>{{$plant->price}}</td>
                  <td>
                    <a href="{{route('plants.edit', $plant->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <form action="{{route('plants.destroy', $plant->id)}}" method="POST" class="d-inline">
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