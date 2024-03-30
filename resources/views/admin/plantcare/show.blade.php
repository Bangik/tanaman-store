@extends('layouts.admin.app')

@section('title', 'Detail Tanaman Care')

@section('content')
<div class="section-header">
  <h1>Detail Tanaman Care</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{route('plantCares.index')}}">Tanaman Care</a></div>
    <div class="breadcrumb-item">Detail Tanaman Care</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Detail Tanaman Care</h2>
  <p class="section-lead">
    Manajemen data Detail Tanaman Care.
  </p>

  @if(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Nama</th>
                <td>{{$plantCare->name}}</td>
              </tr>
              <tr>
                <th>Telp</th>
                <td>{{$plantCare->phone}}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{$plantCare->address}}</td>
              </tr>
              <tr>
                <th>Tanaman</th>
                <td>{{$plantCare->plant}}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  @if($plantCare->status == 'pending')
                  <span class="badge badge-warning">Pending</span>
                  @elseif($plantCare->status == 'approved')
                  <span class="badge badge-success">Approved</span>
                  @else
                  <span class="badge badge-danger">Rejected</span>
                  @endif
                </td>
                <tr>
                  <th>Aksi</th>
                  <td>
                    <form action="{{route('plantCares.update', $plantCare->id)}}" method="post">
                      @csrf
                      @method('patch')
                      <div class="input-group">
                        <select name="status" class="form-control">
                          <option value="approved">Approve</option>
                          <option value="rejected">Reject</option>
                        </select>
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
