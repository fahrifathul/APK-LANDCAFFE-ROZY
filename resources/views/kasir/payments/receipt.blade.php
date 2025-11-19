<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk - {{ $order->order_number }}</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { 
      font-family: 'Courier New', Courier, monospace; 
      font-size: 13px; 
      background: #f5f5f5;
      padding: 20px;
    }
    .receipt-container {
      max-width: 320px;
      margin: 0 auto;
      background: #fff;
      padding: 20px 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      border: 1px solid #ddd;
    }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .text-left { text-align: left; }
    
    /* Header */
    .header { 
      text-align: center; 
      margin-bottom: 12px;
      padding-bottom: 10px;
      border-bottom: 2px dashed #000;
    }
    .store-name { 
      font-size: 20px; 
      font-weight: bold; 
      margin-bottom: 5px;
      letter-spacing: 2px;
    }
    .store-info { 
      font-size: 11px; 
      color: #555;
      line-height: 1.5;
    }
    
    /* Order Info */
    .order-info { 
      margin: 12px 0;
      font-size: 12px;
      line-height: 1.6;
    }
    .info-row { 
      display: flex;
      justify-content: space-between;
      margin-bottom: 3px;
    }
    
    /* Separator */
    .separator { 
      border-top: 1px dashed #000; 
      margin: 12px 0;
    }
    .separator-solid { 
      border-top: 2px solid #000; 
      margin: 12px 0;
    }
    
    /* Items */
    .items { margin: 12px 0; }
    .item { 
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
      font-size: 12px;
    }
    .item-name { 
      flex: 1;
      padding-right: 10px;
    }
    .item-qty { 
      width: 40px;
      text-align: center;
    }
    .item-price { 
      width: 80px;
      text-align: right;
    }
    .item-notes {
      font-size: 11px;
      color: #666;
      margin-left: 5px;
      margin-top: -5px;
      margin-bottom: 5px;
    }
    
    /* Summary */
    .summary { 
      margin-top: 12px;
      font-size: 12px;
    }
    .summary-row { 
      display: flex;
      justify-content: space-between;
      padding: 5px 0;
    }
    .summary-row.total { 
      font-weight: bold;
      font-size: 15px;
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
      padding: 8px 0;
      margin: 8px 0;
    }
    .summary-row.change {
      font-weight: bold;
      font-size: 14px;
    }
    
    /* Footer */
    .footer { 
      text-align: center;
      margin-top: 15px;
      padding-top: 12px;
      border-top: 2px dashed #000;
      font-size: 11px;
    }
    .footer-thanks {
      font-weight: bold;
      margin-bottom: 5px;
      font-size: 13px;
    }
    
    /* Print Button */
    .no-print {
      text-align: center;
      margin-top: 20px;
      padding-top: 15px;
      border-top: 1px solid #ddd;
    }
    .btn {
      display: inline-block;
      padding: 8px 16px;
      margin: 0 5px;
      border: 1px solid #ddd;
      border-radius: 4px;
      text-decoration: none;
      font-size: 13px;
      cursor: pointer;
      font-family: Arial, sans-serif;
    }
    .btn-primary {
      background: #007bff;
      color: white;
      border-color: #007bff;
    }
    .btn-secondary {
      background: #6c757d;
      color: white;
      border-color: #6c757d;
    }
    .btn-outline {
      background: white;
      color: #333;
    }
    
    @media print {
      body { 
        background: white; 
        padding: 0;
      }
      .receipt-container {
        max-width: 80mm;
        box-shadow: none;
        border: none;
        padding: 10px;
      }
      .no-print { display: none; }
    }
  </style>
</head>
<body>
  <div class="receipt-container">
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
      <div class="info-row">
        <span>No Order</span>
        <span>: {{ $order->order_number }}</span>
      </div>
      <div class="info-row">
        <span>Tanggal</span>
        <span>: {{ $order->created_at->format('d/m/Y H:i') }}</span>
      </div>
      <div class="info-row">
        <span>Kasir</span>
        <span>: {{ $order->user?->name ?? 'Admin' }}</span>
      </div>
      <div class="info-row">
        <span>Pelanggan</span>
        <span>: {{ $order->customer_name ?? '-' }}</span>
      </div>
      <div class="info-row">
        <span>Meja</span>
        <span>: {{ $order->table_number ?? '-' }}</span>
      </div>
    </div>

    <div class="separator"></div>

    <!-- Items -->
    <div class="items">
      @foreach($order->items as $it)
        <div class="item">
          <div class="item-name">{{ $it->menu?->name }}</div>
          <div class="item-qty">{{ $it->quantity }}x</div>
          <div class="item-price">{{ number_format($it->subtotal, 0, ',', '.') }}</div>
        </div>
        @if($it->notes)
        <div class="item-notes">*{{ $it->notes }}</div>
        @endif
      @endforeach
    </div>

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
      <div class="summary-row change">
        <span>Kembalian</span>
        <span>Rp {{ number_format(max($order->paid_amount - $order->total_amount, 0), 0, ',', '.') }}</span>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="footer-thanks">*** TERIMA KASIH ***</div>
      <div>Selamat Menikmati!</div>
      <div style="margin-top:8px; font-size:10px;">{{ now()->format('d/m/Y H:i:s') }}</div>
    </div>

    <!-- Action Buttons -->
    <div class="no-print">
      <a href="{{ route('kasir.orders.index') }}" class="btn btn-outline">← Kembali</a>
      <a href="{{ route('kasir.payments.receipt_pdf', $order) }}" class="btn btn-secondary" target="_blank">📄 PDF</a>
      <button class="btn btn-primary" onclick="window.print()">🖨️ Cetak</button>
    </div>
  </div>
</body>
</html>
