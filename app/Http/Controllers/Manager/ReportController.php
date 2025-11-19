<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('manager.reports.index');
    }

    public function sales(Request $request)
    {
        $from = $request->query('from', Carbon::now()->startOfMonth()->toDateString());
        $to = $request->query('to', Carbon::now()->endOfMonth()->toDateString());

        $orders = Order::whereBetween('created_at', [Carbon::parse($from)->startOfDay(), Carbon::parse($to)->endOfDay()])
            ->whereIn('status', ['done', 'paid'])
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        $total_sales = $orders->getCollection()->sum('total_amount');

        return view('manager.reports.sales', compact('orders', 'from', 'to', 'total_sales'));
    }

    public function finance(Request $request)
    {
        $from = $request->query('from', Carbon::now()->startOfMonth()->toDateString());
        $to = $request->query('to', Carbon::now()->endOfMonth()->toDateString());

        $payments = Payment::whereBetween('payment_date', [Carbon::parse($from)->startOfDay(), Carbon::parse($to)->endOfDay()])
            ->orderByDesc('payment_date')
            ->paginate(20)
            ->withQueryString();

        $total_income = $payments->getCollection()->sum('amount');

        return view('manager.reports.finance', compact('payments', 'from', 'to', 'total_income'));
    }

    public function exportPdf(Request $request)
    {
        $from = $request->query('from', Carbon::now()->startOfMonth()->toDateString());
        $to = $request->query('to', Carbon::now()->endOfMonth()->toDateString());

        $orders = Order::whereBetween('created_at', [Carbon::parse($from)->startOfDay(), Carbon::parse($to)->endOfDay()])
            ->whereIn('status', ['done', 'paid'])
            ->orderBy('created_at')
            ->get();

        $total_sales = $orders->sum('total_amount');

        $pdf = Pdf::loadView('manager.reports.pdf', [
            'orders' => $orders,
            'from' => $from,
            'to' => $to,
            'total_sales' => $total_sales,
            'generated_at' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-penjualan-'.$from.'-sd-'.$to.'.pdf');
    }

    public function exportFinancePdf(Request $request)
    {
        $from = $request->query('from', Carbon::now()->startOfMonth()->toDateString());
        $to = $request->query('to', Carbon::now()->endOfMonth()->toDateString());

        $payments = Payment::with('order')
            ->whereBetween('payment_date', [Carbon::parse($from)->startOfDay(), Carbon::parse($to)->endOfDay()])
            ->orderBy('payment_date')
            ->get();

        $total_income = $payments->sum('amount');

        $pdf = Pdf::loadView('manager.reports.finance_pdf', [
            'payments' => $payments,
            'from' => $from,
            'to' => $to,
            'total_income' => $total_income,
            'generated_at' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-keuangan-'.$from.'-sd-'.$to.'.pdf');
    }
}
