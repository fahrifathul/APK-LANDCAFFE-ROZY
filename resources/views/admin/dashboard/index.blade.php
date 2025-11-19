@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <!-- Title removed from here -->

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <!-- Today's Sales -->
        <div class="col-md-4">
            <div class="admin-card h-100">
                <div class="p-4">
                    <h2 class="mb-1 text-center">{{ number_format($todaySales, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0 text-center">Total transaksi hari ini</p>
                </div>
            </div>
        </div>

        <!-- Today's Revenue -->
        <div class="col-md-4">
            <div class="admin-card h-100">
                <div class="p-4">
                    <h2 class="mb-1 text-center">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0 text-center">Total pendapatan hari ini</p>
                </div>
            </div>
        </div>

        <!-- Total Products Sold -->
        <div class="col-md-4">
            <div class="admin-card h-100">
                <div class="p-4">
                    <h2 class="mb-1 text-center">{{ number_format($totalProductsSold, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0 text-center">Total item terjual hari ini</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="admin-card">
        <div class="p-4 border-bottom">
            <h1 class="page-title mb-0">Dashboard</h1>
        </div>
        <div class="table-wrap">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th># Order</th>
                        <th>Waktu</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->created_at->format('H:i') }}</td>
                        <td>{{ $order->customer_name ?? 'Pelanggan' }}</td>
                        <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td>
                            @if($order->status === 'paid')
                                <span class="badge bg-success">Lunas</span>
                            @elseif($order->status === 'done')
                                <span class="badge bg-info">Selesai</span>
                            @else
                                <span class="badge bg-warning">Diproses</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada transaksi hari ini</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Top Selling Products -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="admin-card h-100">
                <div class="p-4 border-bottom">
                    <h5 class="card-title mb-0">Produk Terlaris Hari Ini</h5>
                </div>
                <div class="p-3">
                    @if(count($topProducts) > 0)
                        @foreach($topProducts as $product)
                        <div class="d-flex align-items-center py-2 border-bottom">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ $product->name }}</h6>
                                <small class="text-muted">{{ $product->total_sold }} terjual</small>
                            </div>
                            <div class="ms-3">
                                <span class="fw-bold">Rp {{ number_format($product->revenue, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted mb-0">Belum ada data penjualan produk hari ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="admin-card h-100">
                <div class="p-4 border-bottom">
                    <h5 class="card-title mb-0">Ringkasan Kategori</h5>
                </div>
                <div class="p-3">
                    @if(count($categorySales) > 0)
                        @foreach($categorySales as $category)
                        <div class="d-flex align-items-center py-2 border-bottom">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ $category->name }}</h6>
                                <small class="text-muted">{{ $category->total_orders }} transaksi</small>
                            </div>
                            <div class="ms-3">
                                <span class="fw-bold">Rp {{ number_format($category->total_revenue, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted mb-0">Belum ada data kategori terjual hari ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
