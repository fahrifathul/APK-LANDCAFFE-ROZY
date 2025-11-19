<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Keuangan {{ $from }} s/d {{ $to }}</title>
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
  <h2 class="text-center">Laporan Keuangan</h2>
  <p><strong>Periode:</strong> {{ $from }} s/d {{ $to }}<br>
     <strong>Dibuat:</strong> {{ \Illuminate\Support\Carbon::parse($generated_at)->format('d M Y H:i') }}</p>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Tanggal</th>
        <th>No Order</th>
        <th>Metode</th>
        <th class="text-right">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      @foreach($payments as $i => $p)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ \Illuminate\Support\Carbon::parse($p->payment_date)->format('d M Y H:i') }}</td>
        <td>{{ $p->order?->order_number }}</td>
        <td>{{ strtoupper($p->payment_method) }}</td>
        <td class="text-right">Rp {{ number_format($p->amount, 0, ',', '.') }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4" class="text-right">Total Pemasukan</th>
        <th class="text-right">Rp {{ number_format($total_income, 0, ',', '.') }}</th>
      </tr>
    </tfoot>
  </table>
</body>
</html>
