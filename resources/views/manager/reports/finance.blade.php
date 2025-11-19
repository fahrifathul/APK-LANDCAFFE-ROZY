@extends('admin.layouts.app')

@section('title', 'Manager - Laporan Keuangan')

@section('content')
<h1 class="h3 mb-3">Laporan Keuangan</h1>

<form class="row g-3 mb-3" method="GET" action="{{ route('manager.reports.finance') }}">
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
    <a class="btn btn-outline-secondary" href="{{ route('manager.reports.finance_pdf', ['from'=>$from,'to'=>$to]) }}">Export PDF</a>
  </div>
</form>

<div class="card mb-3">
  <div class="card-body d-flex justify-content-between">
    <div><strong>Periode:</strong> {{ $from }} s/d {{ $to }}</div>
    <div><strong>Total Pemasukan:</strong> Rp {{ number_format($total_income, 0, ',', '.') }}</div>
  </div>
</div>

<table class="table table-bordered align-middle">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>No Order</th>
      <th>Metode</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    @forelse($payments as $pmt)
    <tr>
      <td>{{ $loop->iteration + ($payments->currentPage() - 1) * $payments->perPage() }}</td>
      <td>{{ \Illuminate\Support\Carbon::parse($pmt->payment_date)->format('d M Y H:i') }}</td>
      <td>{{ $pmt->order?->order_number }}</td>
      <td>{{ strtoupper($pmt->payment_method) }}</td>
      <td>Rp {{ number_format($pmt->amount, 0, ',', '.') }}</td>
    </tr>
    @empty
    <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $payments->links() }}
@endsection
