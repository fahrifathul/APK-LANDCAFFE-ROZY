@extends('admin.layouts.app')

@section('title', 'Kasir - Pesanan')
@section('page_title', 'Pesanan (Kasir)')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-3">
  <div class="d-flex align-items-center gap-3">
    <h1 class="h3 mb-0">Pesanan</h1>
    <a href="{{ route('kasir.orders.pos') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
      <i class="fas fa-cash-register"></i> Kasir Baru
    </a>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a href="{{ route('kasir.orders.index') }}" class="btn btn-sm btn-outline-secondary">Semua</a>
    <a href="{{ route('kasir.orders.index', ['status' => 'ordered']) }}" class="btn btn-sm btn-outline-primary @if($status==='ordered') active @endif">Ordered</a>
    <a href="{{ route('kasir.orders.index', ['status' => 'done']) }}" class="btn btn-sm btn-outline-success @if($status==='done') active @endif">Done</a>
    <a href="{{ route('kasir.orders.index', ['status' => 'paid']) }}" class="btn btn-sm btn-outline-dark @if($status==='paid') active @endif">Paid</a>
  </div>
</div>

<div class="table-wrap p-0">
  <div class="table-responsive">
    <table class="table table-bordered align-middle mb-0">
      <thead>
        <tr>
          <th>#</th>
          <th>No Order</th>
          <th>Pelanggan</th>
          <th>Meja</th>
          <th>Status</th>
          <th>Total</th>
          <th>Dibayar</th>
          <th>Waktu</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $order)
        <tr>
          <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
          <td><span class="text-nowrap">{{ $order->order_number }}</span></td>
          <td>{{ $order->customer_name ?? '-' }}</td>
          <td>{{ $order->table_number ?? '-' }}</td>
          <td>
            @if($order->status==='ordered')
              <span class="badge text-bg-primary">Ordered</span>
            @elseif($order->status==='done')
              <span class="badge text-bg-success">Done</span>
            @else
              <span class="badge text-bg-dark">Paid</span>
            @endif
          </td>
          <td><span class="text-nowrap">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span></td>
          <td><span class="text-nowrap">Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</span></td>
          <td><span class="text-nowrap">{{ $order->created_at->format('d M Y H:i') }}</span></td>
          <td class="text-end">
            <div class="btn-group btn-group-sm" role="group">
              @if($order->status==='ordered')
                <form action="{{ route('kasir.orders.done', $order) }}" method="POST" class="d-inline">
                  @csrf
                  <button class="btn btn-success" title="Tandai Done">✓ Done</button>
                </form>
                <a href="{{ route('kasir.payments.create', $order) }}" class="btn btn-primary" title="Bayar">💳 Bayar</a>
              @elseif($order->status==='done')
                <a href="{{ route('kasir.payments.create', $order) }}" class="btn btn-primary" title="Bayar">💳 Bayar</a>
              @else
                <a href="{{ route('kasir.payments.receipt', $order) }}" class="btn btn-secondary" target="_blank" title="Lihat Struk">🧾 Struk</a>
              @endif
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="9" class="text-center py-4">Belum ada pesanan.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3 d-flex justify-content-center">
  <div class="pagination-wrapper">
    {{ $orders->onEachSide(1)->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
