<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.categories.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Admin: Kategori</div>
                                <div class="text-sm text-gray-600">Kelola kategori menu</div>
                            </a>
                            <a href="{{ route('admin.menus.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Admin: Menu</div>
                                <div class="text-sm text-gray-600">Kelola menu & gambar</div>
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Admin: Users</div>
                                <div class="text-sm text-gray-600">Kelola akun & role</div>
                            </a>
                            <a href="{{ route('admin.logs.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Admin: Logs</div>
                                <div class="text-sm text-gray-600">Aktivitas sistem</div>
                            </a>
                        @elseif(auth()->user()->role === 'kasir')
                            <a href="{{ route('kasir.orders.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Kasir: Pesanan</div>
                                <div class="text-sm text-gray-600">Kelola pesanan & pembayaran</div>
                            </a>
                        @elseif(auth()->user()->role === 'chef')
                            <a href="{{ route('chef.orders.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Chef: Pesanan</div>
                                <div class="text-sm text-gray-600">Siapkan pesanan & tandai selesai</div>
                            </a>
                        @elseif(auth()->user()->role === 'manager')
                            <a href="{{ route('manager.reports.index') }}" class="block p-4 border rounded hover:bg-gray-50">
                                <div class="font-semibold">Manager: Laporan</div>
                                <div class="text-sm text-gray-600">Penjualan & Keuangan + PDF</div>
                            </a>
                        @endif
                    </div>

                    <!-- Semua Menu (tanpa harga) -->
                    @isset($menus)
                        <h3 class="mt-10 mb-4 text-lg font-semibold text-gray-800">Semua Menu</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach($menus as $menu)
                                <div class="border rounded-lg overflow-hidden bg-white shadow-sm">
                                    @if($menu->image)
                                        <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->name }}" class="w-full h-40 object-cover">
                                    @else
                                        <div class="w-full h-40 bg-gray-100"></div>
                                    @endif
                                    <div class="p-3">
                                        <div class="text-xs text-gray-500">{{ $menu->category?->name }}</div>
                                        <div class="mt-1 font-semibold text-gray-900">{{ $menu->name }}</div>
                                        @if($menu->description)
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ \Illuminate\Support\Str::limit($menu->description, 120) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
