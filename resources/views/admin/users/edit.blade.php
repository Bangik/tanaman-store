@extends('layouts.admin.app')

@section('content')
<div class="section-header">
  <h1>Users</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></div>
    <div class="breadcrumb-item">Edit</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Users</h2>
  <p class="section-lead">
    Edit data User.
  </p>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">

              @error('name')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">

              @error('email')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="phone">Telp</label>
              <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}">

              @error('phone')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$user->address}}">

              @error('address')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                <option value="user" {{$user->role == 'user' ? 'selected' : ''}}>User</option>
              </select>

              @error('role')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection