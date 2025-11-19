@extends('admin.layouts.app')

@section('title', 'Chef - Pesanan Diproses')

@section('content')
<h1 class="h3 mb-3">Pesanan Menunggu Disiapkan</h1>

<table class="table table-bordered align-middle">
  <thead>
    <tr>
      <th>#</th>
      <th>No Order</th>
      <th>Pelanggan</th>
      <th>Meja</th>
      <th>Waktu</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)
    <tr>
      <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
      <td>{{ $order->order_number }}</td>
      <td>{{ $order->customer_name ?? '-' }}</td>
      <td>{{ $order->table_number ?? '-' }}</td>
      <td>{{ $order->created_at->format('d M Y H:i') }}</td>
      <td class="text-end">
        <form action="{{ route('chef.orders.done', $order) }}" method="POST" class="d-inline">
          @csrf
          <button class="btn btn-sm btn-success">Tandai Selesai</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center">Tidak ada pesanan menunggu.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $orders->links() }}
@endsection
