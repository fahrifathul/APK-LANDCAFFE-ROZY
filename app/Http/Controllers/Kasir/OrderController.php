<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = Order::orderByDesc('created_at');
        if (in_array($status, ['ordered', 'done', 'paid'])) {
            $query->where('status', $status);
        }
        $orders = $query->paginate(15)->withQueryString();
        return view('kasir.orders.index', compact('orders', 'status'));
    }
    
    /**
     * Tampilkan halaman POS (Point of Sale)
     */
    public function pos()
    {
        $categories = \App\Models\Category::with(['menus' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->orderBy('name')->get();

        $menus = \App\Models\Menu::where('is_available', true)
            ->orderBy('name')
            ->get();

        return view('kasir.orders.new-pos', compact('categories', 'menus'));
    }

    public function create()
    {
        $menus = Menu::where('is_available', true)->orderBy('name')->get();
        return view('kasir.orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'table_number' => 'nullable|string|max:50',
            'items' => 'required|array|min:1',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.notes' => 'nullable|string',
        ]);

        $order = DB::transaction(function () use ($data) {
            $order = Order::create([
                'order_number' => 'ORD-' . now()->format('YmdHis') . '-' . strtoupper(substr(uniqid(), -4)),
                'customer_name' => $data['customer_name'] ?? null,
                'table_number' => $data['table_number'] ?? null,
                'status' => 'ordered',
                'total_amount' => 0,
                'paid_amount' => 0,
            ]);

            $total = 0;
            foreach ($data['items'] as $item) {
                $menu = Menu::findOrFail($item['menu_id']);
                $qty = (int) $item['quantity'];
                $price = $menu->price;
                $subtotal = $price * $qty;
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $menu->id,
                    'quantity' => $qty,
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'notes' => $item['notes'] ?? null,
                ]);
                $total += $subtotal;
            }

            $order->update(['total_amount' => $total]);

            ActivityLog::create([
                'user_id' => auth()->id(),
                'activity' => "Kasir membuat order {$order->order_number} total Rp {$total}",
            ]);

            return $order;
        });

        return redirect()->route('kasir.orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function markDone(Order $order)
    {
        if ($order->status !== 'ordered') {
            return back()->with('success', 'Status pesanan tidak valid untuk diubah ke done.');
        }

        $order->update(['status' => 'done']);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => "Kasir menandai order {$order->order_number} sebagai done",
        ]);

        return back()->with('success', 'Pesanan ditandai selesai.');
    }
}
