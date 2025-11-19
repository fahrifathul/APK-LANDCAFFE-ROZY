<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penjualan {{ $from }} s/d {{ $to }}</title>
  <style>
    body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; }
    .text-right { text-align: right; }
    .text-center { text-align: center; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #000; padding: 6px; }
    th { background: #eee; }
  </style>
</head>
<body>
  <h2 class="text-center">Laporan Penjualan</h2>
  <p><strong>Periode:</strong> {{ $from }} s/d {{ $to }}<br>
     <strong>Dibuat:</strong> {{ \Illuminate\Support\Carbon::parse($generated_at)->format('d M Y H:i') }}</p>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Tanggal</th>
        <th>No Order</th>
        <th>Pelanggan</th>
        <th class="text-right">Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $i => $order)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d M Y H:i') }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->customer_name ?? '-' }}</td>
        <td class="text-right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
        <td>{{ ucfirst($order->status) }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4" class="text-right">Total Penjualan</th>
        <th class="text-right">Rp {{ number_format($total_sales, 0, ',', '.') }}</th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</body>
</html>
