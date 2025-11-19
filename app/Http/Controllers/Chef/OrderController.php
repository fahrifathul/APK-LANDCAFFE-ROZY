<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'ordered')->orderBy('created_at')->paginate(20);
        return view('chef.orders.index', compact('orders'));
    }

    public function markDone(Order $order)
    {
        if ($order->status !== 'ordered') {
            return back()->with('success', 'Pesanan bukan status ordered.');
        }

        $order->update(['status' => 'done']);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => "Chef menandai order {$order->order_number} sebagai done",
        ]);

        return back()->with('success', 'Pesanan ditandai selesai.');
    }
}
