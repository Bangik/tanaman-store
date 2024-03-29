@extends('layouts.user.app')

@section('title', 'Profil Pengguna')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Profil Pengguna</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Profil Pengguna</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{route('profile.update')}}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                        </div>
                        @error('name')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                        </div>
                        @error('email')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                        @error('phone')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address" name="address" rows="3">{{Auth::user()->address}}</textarea>
                        </div>
                        @error('address')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">Simpan</button>
                            <a href="{{ route('profile.edit.password') }}" class="btn border border-secondary rounded-pill px-3 text-primary">Ubah Password</a>
                            <a href="{{ route('logout') }}" class="btn border border-secondary rounded-pill px-3 text-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
<!-- Cart Page End -->
@endsection