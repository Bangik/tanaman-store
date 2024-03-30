@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>User</h4>
            </div>
            <div class="card-body">
            {{$total_users}}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-info">
            <i class="fas fa-seedling"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Tanaman</h4>
            </div>
            <div class="card-body">
            {{$total_tanaman}}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Transaksi OK</h4>
            </div>
            <div class="card-body">
            {{$total_transaction_success}}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Tanamancare PNDG</h4>
            </div>
            <div class="card-body">
            {{$total_tanaman_care}}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
