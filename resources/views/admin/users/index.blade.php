@extends('layouts.admin.app')

@section('content')
<div class="section-header">
  <h1>Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Users</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Users</h2>
  <p class="section-lead">
    Manajemen data User.
  </p>

  @if(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('users.create')}}" class="btn btn-primary mb-3">Tambah User</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach($users as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->role}}</td>
                  <td>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
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