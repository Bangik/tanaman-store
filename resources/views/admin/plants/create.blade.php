@extends('layouts.admin.app')

@section('title', 'Tambah Tanaman')

@section('content')
<div class="section-header">
  <h1>Tanaman</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{route('plants.index')}}">Tanaman</a></div>
    <div class="breadcrumb-item">Tambah</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Tanaman</h2>
  <p class="section-lead">
    Tambah data Tanaman.
  </p>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{route('plants.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label> <small class="text-danger">*</small>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

              @error('name')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Deskripsi</label> <small class="text-danger">*</small>
              <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>

              @error('description')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="price">Harga</label> <small class="text-danger">*</small>
              <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">

              @error('price')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="stock">Stok</label> <small class="text-danger">*</small>
              <input type="text" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock')}}">

              @error('stock')
              <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Gambar</label> <small class="text-danger">*</small>
              <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">

              @error('image')
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