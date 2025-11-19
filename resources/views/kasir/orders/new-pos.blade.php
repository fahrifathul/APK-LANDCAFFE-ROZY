@extends('admin.layouts.app')

@section('title', 'Kasir - Point of Sale')

@push('styles')
<style>
    :root {
        --primary: #2e7d32;
        --primary-dark: #1b5e20;
        --primary-light: #81c784;
        --accent: #4caf50;
        --text: #2d3436;
        --light-bg: #f5f5f5;
        --border: #e0e0e0;
        --success: #388e3c;
        --warning: #f57c00;
        --danger: #d32f2f;
    }
    
    body {
        background-color: #f8f9fa;
    }
    
    .pos-container {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 70px);
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .pos-header {
        background: var(--primary);
        color: white;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .pos-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }
    
    .pos-main {
        display: flex;
        flex: 1;
        overflow: hidden;
    }
    
    .menu-section {
        flex: 2;
        display: flex;
        flex-direction: column;
        border-right: 1px solid var(--border);
        overflow: hidden;
    }
    
    .category-tabs {
        display: flex;
        background: white;
        border-bottom: 1px solid var(--border);
        padding: 0.5rem 1rem;
        overflow-x: auto;
        white-space: nowrap;
    }
    
    .category-tab {
        padding: 0.5rem 1rem;
        margin-right: 0.5rem;
        border-radius: 20px;
        background: #f0f0f0;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.9rem;
    }
    
    .category-tab.active {
        background: var(--primary);
        color: white;
    }
    
    .category-tab:hover:not(.active) {
        background: #e0e0e0;
    }
    
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
        padding: 1rem;
        overflow-y: auto;
        flex: 1;
    }
    
    .menu-item {
        background: white;
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }
    
    .menu-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .menu-item-img {
        width: 100%;
        height: 120px;
        object-fit: cover;
    }
    
    .menu-item-body {
        padding: 0.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .menu-item-name {
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }
    
    .menu-item-price {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    .menu-item-actions {
        margin-top: auto;
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-add {
        flex: 1;
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.4rem 0.5rem;
        border-radius: 4px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }
    
    .btn-add:hover {
        background: var(--primary-dark);
    }
    
    .cart-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        max-width: 400px;
        background: white;
        border-left: 1px solid var(--border);
    }
    
    .cart-header {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .cart-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
    }
    
    .cart-items {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
    }
    
    .cart-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        border-radius: 8px;
        background: #f9f9f9;
        margin-bottom: 0.75rem;
    }
    
    .cart-item-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 1rem;
    }
    
    .cart-item-details {
        flex: 1;
    }
    
    .cart-item-name {
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }
    
    .cart-item-price {
        color: var(--primary);
        font-weight: 700;
        font-size: 0.9rem;
    }
    
    .cart-item-actions {
        display: flex;
        align-items: center;
        margin-top: 0.5rem;
    }
    
    .quantity-btn {
        width: 28px;
        height: 28px;
        border: 1px solid var(--border);
        background: white;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.2s;
    }
    
    .quantity-btn:hover {
        background: #f0f0f0;
    }
    
    .quantity-input {
        width: 40px;
        height: 28px;
        text-align: center;
        border: 1px solid var(--border);
        border-radius: 4px;
        margin: 0 0.25rem;
    }
    
    .btn-remove {
        color: var(--danger);
        background: none;
        border: none;
        cursor: pointer;
        margin-left: 0.5rem;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .cart-summary {
        padding: 1.25rem 1.5rem;
        border-top: 1px solid var(--border);
        background: #f9f9f9;
    }
    
    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .total-amount {
        color: var(--primary);
        font-size: 1.3rem;
    }
    
    .btn-checkout {
        width: 100%;
        padding: 0.75rem;
        background: var(--success);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-checkout:hover {
        background: #2e7d32;
    }
    
    .empty-cart {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #9e9e9e;
        text-align: center;
        padding: 2rem;
    }
    
    .empty-cart i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    /* Responsive styles */
    @media (max-width: 992px) {
        .pos-main {
            flex-direction: column;
        }
        
        .menu-section, .cart-section {
            max-width: 100%;
            border-right: none;
            border-bottom: 1px solid var(--border);
        }
        
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        }
    }
    
    @media (max-width: 576px) {
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 0.75rem;
            padding: 0.75rem;
        }
        
        .menu-item-img {
            height: 100px;
        }
        
        .cart-item {
            padding: 0.6rem;
        }
        
        .cart-item-img {
            width: 40px;
            height: 40px;
        }
    }
</style>
@endpush

@section('content')
<div class="pos-container">
    <div class="pos-header">
        <h1 class="pos-title">Kasir</h1>
        <div class="d-flex align-items-center">
            <div class="me-3 text-white">
                <i class="fas fa-user me-1"></i>
                {{ Auth::user()->name }}
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('kasir.orders.index') }}"><i class="fas fa-list me-2"></i>Daftar Pesanan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="pos-main">
        <!-- Menu Section -->
        <div class="menu-section">
            <div class="category-tabs" id="categoryTabs">
                <button type="button" class="category-tab active" data-category="all">Semua Menu</button>
                @foreach($categories as $category)
                    <button type="button" class="category-tab" data-category="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
            
            <div class="menu-grid" id="menuGrid">
                @foreach($menus as $menu)
                    <div class="menu-item" data-category="{{ $menu->category_id }}">
                        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : asset('images/default-menu.jpg') }}" alt="{{ $menu->name }}" class="menu-item-img">
                        <div class="menu-item-body">
                            <div class="menu-item-name">{{ $menu->name }}</div>
                            <div class="menu-item-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                            <button type="button" class="btn-add add-to-cart" data-menu-id="{{ $menu->id }}" data-name="{{ $menu->name }}" data-price="{{ $menu->price }}" data-image="{{ $menu->image ? asset('storage/' . $menu->image) : asset('images/default-menu.jpg') }}">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Cart Section -->
        <div class="cart-section">
            <div class="cart-header">
                <h2 class="cart-title">Keranjang</h2>
                <span class="badge bg-primary rounded-pill" id="cartCount">0</span>
            </div>
            
            <div class="cart-items" id="cartItems">
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Keranjang kosong</p>
                    <small class="text-muted">Pilih menu untuk memulai</small>
                </div>
            </div>
            
            <div class="cart-summary d-none" id="cartSummary">
                <div class="total-row">
                    <span>Total</span>
                    <span class="total-amount" id="cartTotal">Rp 0</span>
                </div>
                <button type="button" class="btn-checkout" id="checkoutBtn">
                    <i class="fas fa-credit-card me-1"></i> Proses Pembayaran
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="checkoutForm" action="{{ route('kasir.orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="items" id="orderItems" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Nama Pelanggan (opsional)</label>
                        <input type="text" class="form-control" id="customerName" name="customer_name" placeholder="Contoh: Bapak Budi">
                    </div>
                    <div class="mb-3">
                        <label for="tableNumber" class="form-label">Nomor Meja (opsional)</label>
                        <input type="text" class="form-control" id="tableNumber" name="table_number" placeholder="Contoh: Meja 1">
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Total yang harus dibayar: <strong id="modalTotal">Rp 0</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                <span id="toastMessage">Item berhasil ditambahkan ke keranjang</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize cart from localStorage or create new one
        let cart = JSON.parse(localStorage.getItem('pos_cart')) || [];
        const cartItemsEl = document.getElementById('cartItems');
        const cartSummaryEl = document.getElementById('cartSummary');
        const emptyCartEl = document.querySelector('.empty-cart');
        const cartCountEl = document.getElementById('cartCount');
        const cartTotalEl = document.getElementById('cartTotal');
        const modalTotalEl = document.getElementById('modalTotal');
        const orderItemsEl = document.getElementById('orderItems');
        const checkoutBtn = document.getElementById('checkoutBtn');
        const checkoutForm = document.getElementById('checkoutForm');
        const successToast = new bootstrap.Toast(document.getElementById('successToast'));
        
        // Filter menu items by category
        const categoryTabs = document.querySelectorAll('.category-tab');
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.getAttribute('data-category');
                
                // Update active tab
                document.querySelector('.category-tab.active').classList.remove('active');
                tab.classList.add('active');
                
                // Show/hide menu items
                const menuItems = document.querySelectorAll('.menu-item');
                menuItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Add to cart functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-to-cart') || e.target.closest('.add-to-cart')) {
                const button = e.target.classList.contains('add-to-cart') ? e.target : e.target.closest('.add-to-cart');
                const menuId = parseInt(button.getAttribute('data-menu-id'));
                const name = button.getAttribute('data-name');
                const price = parseFloat(button.getAttribute('data-price'));
                const image = button.getAttribute('data-image');
                
                addToCart({
                    id: menuId,
                    name: name,
                    price: price,
                    image: image,
                    quantity: 1
                });
                
                // Show success message
                const toastMessage = document.getElementById('toastMessage');
                toastMessage.textContent = `${name} ditambahkan ke keranjang`;
                successToast.show();
            }
            
            // Remove item from cart
            if (e.target.classList.contains('remove-item')) {
                const menuId = parseInt(e.target.getAttribute('data-menu-id'));
                removeFromCart(menuId);
            }
            
            // Update quantity
            if (e.target.classList.contains('quantity-btn')) {
                const menuId = parseInt(e.target.getAttribute('data-menu-id'));
                const action = e.target.getAttribute('data-action');
                updateQuantity(menuId, action);
            }
        });
        
        // Handle quantity input changes
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('quantity-input')) {
                const menuId = parseInt(e.target.getAttribute('data-menu-id'));
                const newQuantity = parseInt(e.target.value) || 1;
                updateCartItem(menuId, newQuantity);
            }
        });
        
        // Checkout button click
        checkoutBtn.addEventListener('click', function() {
            if (cart.length === 0) return;
            
            // Update modal total
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            modalTotalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
            
            // Set order items as JSON string
            const orderItems = cart.map(item => ({
                menu_id: item.id,
                quantity: item.quantity,
                notes: ''
            }));
            orderItemsEl.value = JSON.stringify(orderItems);
            
            // Show modal
            const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
            checkoutModal.show();
        });
        
        // Initialize cart display
        updateCartDisplay();
        
        // Cart functions
        function addToCart(item) {
            const existingItem = cart.find(i => i.id === item.id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push(item);
            }
            
            saveCart();
            updateCartDisplay();
        }
        
        function removeFromCart(menuId) {
            cart = cart.filter(item => item.id !== menuId);
            saveCart();
            updateCartDisplay();
        }
        
        function updateQuantity(menuId, action) {
            const item = cart.find(i => i.id === menuId);
            if (!item) return;
            
            if (action === 'increase') {
                item.quantity += 1;
            } else if (action === 'decrease' && item.quantity > 1) {
                item.quantity -= 1;
            }
            
            saveCart();
            updateCartDisplay();
        }
        
        function updateCartItem(menuId, quantity) {
            const item = cart.find(i => i.id === menuId);
            if (!item) return;
            
            item.quantity = Math.max(1, quantity);
            saveCart();
            updateCartDisplay();
        }
        
        function saveCart() {
            localStorage.setItem('pos_cart', JSON.stringify(cart));
        }
        
        function updateCartDisplay() {
            // Update cart count
            const itemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountEl.textContent = itemCount;
            
            // Calculate total
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
            
            // Update cart items
            if (cart.length === 0) {
                cartItemsEl.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Keranjang kosong</p>
                        <small class="text-muted">Pilih menu untuk memulai</small>
                    </div>
                `;
                cartSummaryEl.classList.add('d-none');
                return;
            }
            
            // Show cart items
            cartSummaryEl.classList.remove('d-none');
            
            let cartHTML = '';
            cart.forEach(item => {
                const subtotal = item.price * item.quantity;
                cartHTML += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                        <div class="cart-item-details">
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                            <div class="cart-item-actions">
                                <button type="button" class="quantity-btn" data-menu-id="${item.id}" data-action="decrease">-</button>
                                <input type="number" class="quantity-input" value="${item.quantity}" min="1" data-menu-id="${item.id}">
                                <button type="button" class="quantity-btn" data-menu-id="${item.id}" data-action="increase">+</button>
                                <button type="button" class="btn-remove remove-item" data-menu-id="${item.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="ms-auto fw-bold">Rp ${subtotal.toLocaleString('id-ID')}</div>
                    </div>
                `;
            });
            
            cartItemsEl.innerHTML = cartHTML;
        }
        
        // Clear cart after successful order
        checkoutForm.addEventListener('submit', function() {
            localStorage.removeItem('pos_cart');
        });
    });
</script>
@endpush
