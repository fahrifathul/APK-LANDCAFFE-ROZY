<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        if (!in_array($order->status, ['ordered', 'done'])) {
            return back()->with('success', 'Order tidak valid untuk pembayaran.');
        }
        $methods = ['cash' => 'Cash', 'qris' => 'QRIS', 'card' => 'Kartu'];
        return view('kasir.payments.create', compact('order', 'methods'));
    }

    public function store(Request $request, Order $order)
    {
        if (!in_array($order->status, ['ordered', 'done'])) {
            return back()->with('success', 'Order tidak valid untuk pembayaran.');
        }

        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:50',
        ]);

        DB::transaction(function () use ($order, $data) {
            Payment::create([
                'order_id' => $order->id,
                'amount' => $data['amount'],
                'payment_method' => $data['payment_method'],
                'payment_date' => now(),
            ]);

            $paid = $order->paid_amount + $data['amount'];
            $status = $paid >= $order->total_amount ? 'paid' : $order->status;
            $order->update([
                'paid_amount' => $paid,
                'payment_method' => $data['payment_method'],
                'status' => $status,
            ]);

            ActivityLog::create([
                'user_id' => auth()->id(),
                'activity' => "Pembayaran order {$order->order_number} sebesar Rp {$data['amount']} via {$data['payment_method']}",
            ]);
        });

        return redirect()->route('kasir.payments.receipt', $order)->with('success', 'Pembayaran berhasil diproses.');
    }

    public function receipt(Order $order)
    {
        $order->load(['items.menu', 'payments']);
        return view('kasir.payments.receipt', compact('order'));
    }

    public function receiptPdf(Order $order)
    {
        $order->load(['items.menu', 'payments']);
        $pdf = Pdf::loadView('kasir.payments.receipt_pdf', [
            'order' => $order,
            'generated_at' => now(),
        ])->setPaper('a5', 'portrait');

        return $pdf->download('struk-'.$order->order_number.'.pdf');
    }
}
