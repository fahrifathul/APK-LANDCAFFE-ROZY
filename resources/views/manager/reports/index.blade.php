@extends('admin.layouts.app')

@section('title', 'Manager - Laporan')

@section('content')
<h1 class="h3 mb-3">Laporan</h1>

<div class="row g-3">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Laporan Penjualan</h5>
        <p class="card-text">Lihat daftar penjualan per periode.</p>
        <a href="{{ route('manager.reports.sales') }}" class="btn btn-primary">Lihat Penjualan</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Laporan Keuangan</h5>
        <p class="card-text">Lihat pemasukan dari pembayaran per periode.</p>
        <a href="{{ route('manager.reports.finance') }}" class="btn btn-primary">Lihat Keuangan</a>
      </div>
    </div>
  </div>
</div>
@endsection
