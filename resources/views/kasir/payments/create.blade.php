@extends('admin.layouts.app')

@section('title', 'Kasir - Pembayaran')

@section('content')
<h1 class="h3 mb-3">Pembayaran - {{ $order->order_number }}</h1>

<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4"><strong>Pelanggan:</strong> {{ $order->customer_name ?? '-' }}</div>
      <div class="col-md-4"><strong>Meja:</strong> {{ $order->table_number ?? '-' }}</div>
      <div class="col-md-4"><strong>Status:</strong> <span class="badge text-bg-{{ $order->status==='paid'?'dark':($order->status==='done'?'success':'primary') }}">{{ ucfirst($order->status) }}</span></div>
    </div>
    <div class="row mt-2">
      <div class="col-md-4"><strong>Total:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</div>
      <div class="col-md-4"><strong>Sudah Dibayar:</strong> Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</div>
      <div class="col-md-4"><strong>Sisa:</strong> Rp {{ number_format(max($order->total_amount - $order->paid_amount, 0), 0, ',', '.') }}</div>
    </div>
  </div>
</div>

<form method="POST" action="{{ route('kasir.payments.store', $order) }}">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Jumlah Bayar</label>
      <input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', max($order->total_amount - $order->paid_amount, 0)) }}" class="form-control @error('amount') is-invalid @enderror" required>
      @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
      <label class="form-label">Metode</label>
      <select name="payment_method" class="form-select @error('payment_method') is-invalid @enderror" required>
        @foreach($methods as $key=>$label)
          <option value="{{ $key }}" @selected(old('payment_method')===$key)>{{ $label }}</option>
        @endforeach
        <option value="qris" @selected(old('payment_method')==='qris')">QRIS</option>
      </select>
      @error('payment_method')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="d-flex gap-2 mt-3">
    <a href="{{ route('kasir.orders.index') }}" class="btn btn-outline-secondary">Kembali</a>
    <button class="btn btn-primary">Proses Pembayaran</button>
  </div>

  @if(old('payment_method') === 'qris')
    <div class="mt-3">
      <img src="https://example.com/qris/{{ $order->order_number }}" alt="QRIS Code">
      <p>Scan QRIS code to pay</p>
    </div>
  @endif
</form>
@endsection
