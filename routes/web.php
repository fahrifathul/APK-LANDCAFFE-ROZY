<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Kasir\OrderController as KasirOrderController;
use App\Http\Controllers\Kasir\PaymentController as KasirPaymentController;
use App\Models\Menu;
use App\Http\Controllers\Chef\OrderController as ChefOrderController;
use App\Http\Controllers\Manager\ReportController as ManagerReportController;

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('public.menu');
Route::get('/about', [HomeController::class, 'about'])->name('public.about');

// Dashboard: arahkan sesuai peran
Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!$user) return redirect()->route('home');

    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'kasir':
            return redirect()->route('kasir.orders.index');
        case 'chef':
            return redirect()->route('chef.orders.index');
        case 'manager':
            return redirect()->route('manager.reports.index');
        default:
            $menus = Menu::with('category')->orderBy('name')->get();
            return view('dashboard', compact('menus'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (Breeze default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Chef routes (protected)
Route::middleware(['auth', 'role:chef'])->prefix('chef')->as('chef.')->group(function () {
    Route::get('orders', [ChefOrderController::class, 'index'])->name('orders.index');
    Route::post('orders/{order}/done', [ChefOrderController::class, 'markDone'])->name('orders.done');
});

// Manager routes (protected)
Route::middleware(['auth', 'role:manager'])->prefix('manager')->as('manager.')->group(function () {
    Route::get('reports', [ManagerReportController::class, 'index'])->name('reports.index');
    Route::get('reports/sales', [ManagerReportController::class, 'sales'])->name('reports.sales');
    Route::get('reports/finance', [ManagerReportController::class, 'finance'])->name('reports.finance');
    Route::get('reports/pdf', [ManagerReportController::class, 'exportPdf'])->name('reports.pdf');
    Route::get('reports/finance/pdf', [ManagerReportController::class, 'exportFinancePdf'])->name('reports.finance_pdf');
});

// Kasir routes (protected)
Route::middleware(['auth', 'role:kasir'])->prefix('kasir')->as('kasir.')->group(function () {
    Route::get('orders', [KasirOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/pos', [KasirOrderController::class, 'pos'])->name('orders.pos');
    Route::get('orders/create', [KasirOrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [KasirOrderController::class, 'store'])->name('orders.store');
    Route::post('orders/{order}/done', [KasirOrderController::class, 'markDone'])->name('orders.done');

    Route::get('orders/{order}/payment', [KasirPaymentController::class, 'create'])->name('payments.create');
    Route::post('orders/{order}/payment', [KasirPaymentController::class, 'store'])->name('payments.store');
    Route::get('orders/{order}/receipt', [KasirPaymentController::class, 'receipt'])->name('payments.receipt');
    Route::get('orders/{order}/receipt/pdf', [KasirPaymentController::class, 'receiptPdf'])->name('payments.receipt_pdf');
});

// Admin routes (protected)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('logs', [ActivityLogController::class, 'index'])->name('logs.index');
});

// Breeze auth routes
require __DIR__.'/auth.php';
