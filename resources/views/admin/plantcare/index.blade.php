@extends('layouts.admin.app')

@section('title', 'Tanaman Care')

@section('content')
<div class="section-header">
  <h1>Tanaman Care</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Tanaman Care</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Tanaman Care</h2>
  <p class="section-lead">
    Manajemen data Tanaman Care.
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
                  <th>Nama</th>
                  <th>Telp</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach($plantCares as $plantCare)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$plantCare->name}}</td>
                  <td>{{$plantCare->phone}}</td>
                  <td>
                    @if($plantCare->status == 'pending')
                    <span class="badge badge-warning">Pending</span>
                    @elseif($plantCare->status == 'approved')
                    <span class="badge badge-success">Approved</span>
                    @else
                    <span class="badge badge-danger">Rejected</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('plantCares.show', $plantCare->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
                    <form action="{{route('plantCares.destroy', $plantCare->id)}}" method="POST" class="d-inline">
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