<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Demo users for each role (skip if exists)
        $users = [
            ['name' => 'Kasir Demo', 'email' => 'kasir@landcaffe.local', 'role' => 'kasir'],
            ['name' => 'Manager Demo', 'email' => 'manager@landcaffe.local', 'role' => 'manager'],
            ['name' => 'Chef Demo', 'email' => 'chef@landcaffe.local', 'role' => 'chef'],
        ];
        foreach ($users as $u) {
            User::firstOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('password'),
                    'role' => $u['role'],
                ]
            );
        }

        // Categories
        $categories = [
            ['name' => 'Minuman', 'type' => 'minuman', 'description' => 'Aneka minuman dingin dan panas'],
            ['name' => 'Makanan', 'type' => 'makanan', 'description' => 'Makanan utama'],
            ['name' => 'Cake', 'type' => 'Cake', 'description' => 'pancakes'],
        ];
        $catMap = [];
        foreach ($categories as $c) {
            $cat = Category::firstOrCreate(['name' => $c['name']], $c);
            $catMap[$c['type']] = $cat->id;
        }

        // Menu sample dinonaktifkan - gunakan menu yang sudah dibuat via admin panel
        // Uncomment jika ingin menambahkan menu sample
        /*
        $menus = [
            ['category' => 'minuman', 'name' => 'Americano', 'price' => 18000, 'description' => 'Kopi hitam'],
            ['category' => 'minuman', 'name' => 'Cappuccino', 'price' => 22000, 'description' => 'Espresso + susu + foam'],
        ];
        foreach ($menus as $m) {
            Menu::firstOrCreate(
                ['name' => $m['name']],
                [
                    'category_id' => $catMap[$m['category']] ?? array_values($catMap)[0],
                    'description' => $m['description'],
                    'price' => $m['price'],
                    'is_available' => true,
                    'image' => null,
                ]
            );
        }
        */
    }
}
