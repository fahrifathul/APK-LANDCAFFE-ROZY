<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Menu;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SampleOrdersSeeder extends Seeder
{
    public function run(): void
    {
        $menus = Menu::inRandomOrder()->get();
        if ($menus->count() < 3) {
            $this->command->warn('Not enough menus to create sample orders. Seed menus first.');
            return;
        }

        // Create 10 orders across recent dates
        for ($i = 0; $i < 10; $i++) {
            DB::transaction(function () use ($menus, $i) {
                $date = Carbon::now()->subDays(rand(0, 14))->setTime(rand(8, 20), rand(0, 59));
                $order = Order::create([
                    'order_number' => 'ORD-'.Carbon::now()->format('YmdHis').'-'.strtoupper(substr(uniqid(), -4)).$i,
                    'customer_name' => Arr::random(['Andi', 'Budi', 'Citra', 'Dewi', 'Eko', null]),
                    'table_number' => Arr::random(['A1','A2','B1','B2', null]),
                    'status' => 'ordered',
                    'total_amount' => 0,
                    'paid_amount' => 0,
                    'payment_method' => null,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

                $itemsCount = rand(1, 4);
                $chosen = $menus->random($itemsCount);
                $total = 0;
                foreach ($chosen as $m) {
                    $qty = rand(1, 3);
                    $subtotal = $m->price * $qty;
                    OrderItem::create([
                        'order_id' => $order->id,
                        'menu_id' => $m->id,
                        'quantity' => $qty,
                        'price' => $m->price,
                        'subtotal' => $subtotal,
                        'notes' => null,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                    $total += $subtotal;
                }

                $order->update(['total_amount' => $total]);

                // Randomly mark as done or paid with payment
                if (rand(0,1)) {
                    $order->update(['status' => 'done']);
                }
                if (rand(0,1)) {
                    $payDate = (clone $date)->addHours(rand(1, 6));
                    $amount = $total; // fully paid
                    Payment::create([
                        'order_id' => $order->id,
                        'amount' => $amount,
                        'payment_method' => Arr::random(['cash','qris','card']),
                        'payment_date' => $payDate,
                        'created_at' => $payDate,
                        'updated_at' => $payDate,
                    ]);
                    $order->update([
                        'status' => 'paid',
                        'paid_amount' => $amount,
                        'payment_method' => Arr::random(['cash','qris','card']),
                        'updated_at' => $payDate,
                    ]);
                }
            });
        }
    }
}
