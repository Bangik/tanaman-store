@extends('layouts.user.app')

@section('title', 'Ubah Password')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Ubah Password</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Ubah Password</li>
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
        <form action="{{route('profile.update.password')}}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <label for="current_password" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        @error('current_password')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        @error('password')
                        <div class="col-sm-9 offset-sm-3">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">Simpan</button>
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