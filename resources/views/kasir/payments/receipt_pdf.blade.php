<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk - {{ $order->order_number }}</title>
  <style>
    @page { size: 80mm auto; margin: 0; }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { 
      font-family: 'Courier New', Courier, monospace; 
      font-size: 12px; 
      color: #000; 
      width: 80mm;
      margin: 0 auto;
      padding: 10mm 5mm;
    }
    .receipt { width: 100%; }
    .text-right { text-align: right; }
    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .bold { font-weight: bold; }
    
    /* Header */
    .header { 
      text-align: center; 
      margin-bottom: 10px;
      padding-bottom: 8px;
      border-bottom: 1px dashed #000;
    }
    .store-name { 
      font-size: 18px; 
      font-weight: bold; 
      margin-bottom: 3px;
      letter-spacing: 1px;
    }
    .store-info { 
      font-size: 10px; 
      color: #333;
      line-height: 1.4;
    }
    
    /* Order Info */
    .order-info { 
      margin: 8px 0;
      font-size: 11px;
      line-height: 1.5;
    }
    .order-info div { 
      display: flex;
      justify-content: space-between;
    }
    
    /* Separator */
    .separator { 
      border-top: 1px dashed #000; 
      margin: 8px 0;
    }
    .separator-solid { 
      border-top: 1px solid #000; 
      margin: 8px 0;
    }
    
    /* Items Table */
    table { 
      width: 100%; 
      border-collapse: collapse;
      font-size: 11px;
    }
    th, td { 
      padding: 4px 2px;
      vertical-align: top;
    }
    .item-name { 
      text-align: left;
      max-width: 35mm;
    }
    .item-qty { 
      text-align: center;
      width: 15mm;
    }
    .item-price { 
      text-align: right;
      width: 25mm;
    }
    
    /* Footer Summary */
    .summary { 
      margin-top: 8px;
      font-size: 11px;
    }
    .summary-row { 
      display: flex;
      justify-content: space-between;
      padding: 3px 0;
    }
    .summary-row.total { 
      font-weight: bold;
      font-size: 13px;
      border-top: 1px solid #000;
      border-bottom: 1px solid #000;
      padding: 5px 0;
      margin: 5px 0;
    }
    
    /* Footer */
    .footer { 
      text-align: center;
      margin-top: 10px;
      padding-top: 8px;
      border-top: 1px dashed #000;
      font-size: 10px;
    }
    
    @media print {
      body { padding: 5mm 3mm; }
    }
  </style>
</head>
<body>
  <div class="receipt">
    <!-- Header -->
    <div class="header">
      <div class="store-name">LANDCAFFE</div>
      <div class="store-info">
        Jl. Contoh No. 123, Kota<br>
        Telp: 0812-3456-7890
      </div>
    </div>
    
    <!-- Order Info -->
    <div class="order-info">
      <div><span>No Order</span><span>: {{ $order->order_number }}</span></div>
      <div><span>Tanggal</span><span>: {{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</span></div>
      <div><span>Kasir</span><span>: {{ $order->user?->name ?? 'Admin' }}</span></div>
      <div><span>Pelanggan</span><span>: {{ $order->customer_name ?? '-' }}</span></div>
      <div><span>Meja</span><span>: {{ $order->table_number ?? '-' }}</span></div>
    </div>

    <div class="separator"></div>

    <!-- Items -->
    <table>
      <tbody>
        @foreach($order->items as $it)
        <tr>
          <td class="item-name">{{ $it->menu?->name }}</td>
          <td class="item-qty">{{ $it->quantity }}x</td>
          <td class="item-price">{{ number_format($it->subtotal, 0, ',', '.') }}</td>
        </tr>
        @if($it->notes)
        <tr>
          <td colspan="3" style="font-size:10px; padding-left:5px; color:#555;">
            *{{ $it->notes }}
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>

    <div class="separator"></div>

    <!-- Summary -->
    <div class="summary">
      <div class="summary-row">
        <span>Subtotal</span>
        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row total">
        <span>TOTAL</span>
        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row">
        <span>Dibayar ({{ strtoupper($order->payment_method ?? 'CASH') }})</span>
        <span>Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</span>
      </div>
      <div class="summary-row" style="font-weight:bold;">
        <span>Kembalian</span>
        <span>Rp {{ number_format(max($order->paid_amount - $order->total_amount, 0), 0, ',', '.') }}</span>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div style="margin-bottom:5px;">*** TERIMA KASIH ***</div>
      <div>Selamat Menikmati!</div>
      <div style="margin-top:5px; font-size:9px;">Dicetak: {{ now()->format('d/m/Y H:i:s') }}</div>
    </div>
  </div>
</body>
</html>
