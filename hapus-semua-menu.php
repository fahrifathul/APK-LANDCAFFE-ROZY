<?php

// Script untuk hapus SEMUA menu
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🗑️  Menghapus SEMUA menu dari database...\n\n";

try {
    // Hapus semua order items dulu (foreign key constraint)
    $orderItemsDeleted = \DB::table('order_items')->delete();
    echo "✅ Berhasil menghapus {$orderItemsDeleted} order items\n";
    
    // Baru hapus semua menu
    $menusDeleted = \App\Models\Menu::query()->delete();
    echo "✅ Berhasil menghapus {$menusDeleted} menu\n\n";
    
    $remaining = \App\Models\Menu::count();
    echo "📊 Menu tersisa: {$remaining}\n\n";
    
    echo "✨ Selesai! Database menu sekarang kosong.\n";
    echo "   Refresh browser dengan Ctrl+Shift+R\n\n";
    echo "💡 Anda bisa tambahkan menu baru via admin panel:\n";
    echo "   Login: admin@landcaffe.local / password\n";
    
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
