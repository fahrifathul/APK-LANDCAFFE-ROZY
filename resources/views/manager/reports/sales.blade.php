@extends('admin.layouts.app')

@section('title', 'Manager - Laporan Penjualan')

@section('content')
<h1 class="h3 mb-3">Laporan Penjualan</h1>

<form class="row g-3 mb-3" method="GET" action="{{ route('manager.reports.sales') }}">
  <div class="col-md-4">
    <label class="form-label">Dari</label>
    <input type="date" name="from" value="{{ $from }}" class="form-control">
  </div>
  <div class="col-md-4">
    <label class="form-label">Sampai</label>
    <input type="date" name="to" value="{{ $to }}" class="form-control">
  </div>
  <div class="col-md-4 d-flex align-items-end gap-2">
    <button class="btn btn-primary">Filter</button>
    <a class="btn btn-outline-secondary" href="{{ route('manager.reports.pdf', ['from'=>$from,'to'=>$to]) }}">Export PDF</a>
  </div>
</form>

<div class="card mb-3">
  <div class="card-body d-flex justify-content-between">
    <div><strong>Periode:</strong> {{ $from }} s/d {{ $to }}</div>
    <div><strong>Total Penjualan:</strong> Rp {{ number_format($total_sales, 0, ',', '.') }}</div>
  </div>
</div>

<table class="table table-bordered align-middle">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>No Order</th>
      <th>Pelanggan</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)
    <tr>
      <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
      <td>{{ $order->created_at->format('d M Y H:i') }}</td>
      <td>{{ $order->order_number }}</td>
      <td>{{ $order->customer_name ?? '-' }}</td>
      <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
      <td>{{ ucfirst($order->status) }}</td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $orders->links() }}
@endsection
