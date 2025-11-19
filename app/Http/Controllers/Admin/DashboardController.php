<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use App\Models\Category;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        // Today's sales count
        $todaySales = Order::whereDate('created_at', $today)->count();
        
        // Today's total revenue
        $todayRevenue = Order::whereDate('created_at', $today)
            ->where('status', 'paid')
            ->sum('total_amount');
        
        // Total products sold today
        $totalProductsSold = OrderItem::whereHas('order', function($query) use ($today) {
                $query->whereDate('created_at', $today);
            })
            ->sum('quantity');
        
        // Recent orders (last 10)
        $recentOrders = Order::with('items')
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        // Top selling products today
        $topProducts = OrderItem::select(
                'menus.id',
                'menus.name',
                DB::raw('SUM(order_items.quantity) as total_sold'),
                DB::raw('SUM(order_items.subtotal) as revenue')
            )
            ->join('menus', 'order_items.menu_id', '=', 'menus.id')
            ->whereHas('order', function($query) use ($today) {
                $query->whereDate('orders.created_at', $today);
            })
            ->groupBy('menus.id', 'menus.name')
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();
        
        // Sales by category
        $categorySales = Category::select(
                'categories.id',
                'categories.name',
                DB::raw('COUNT(DISTINCT orders.id) as total_orders'),
                DB::raw('SUM(order_items.subtotal) as total_revenue')
            )
            ->join('menus', 'categories.id', '=', 'menus.category_id')
            ->join('order_items', 'menus.id', '=', 'order_items.menu_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereDate('orders.created_at', $today)
            ->where('orders.status', 'paid')
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('total_revenue', 'desc')
            ->get();
        
        return view('admin.dashboard.index', [
            'todaySales' => $todaySales,
            'todayRevenue' => $todayRevenue,
            'totalProductsSold' => $totalProductsSold,
            'recentOrders' => $recentOrders,
            'topProducts' => $topProducts,
            'categorySales' => $categorySales
        ]);
    }
}
