@extends('public.layouts.app')

@section('content')
  <!-- Hero Section -->
  <div class="hero-simple mb-5">
    <div class="container">
      <div class="text-center">
        <h1 class="hero-title mb-3">
          Selamat Datang di <span class="text-primary">LandCaffe</span>
        </h1>
        <p class="hero-subtitle mb-4">
          Nikmati kopi dan makanan berkualitas dengan suasana yang nyaman
        </p>
        <a href="#menu-section" class="btn btn-primary btn-lg">
          Lihat Menu
        </a>
      </div>
    </div>
  </div>

  <!-- Menu Section -->
  <div class="mb-5" id="menu-section">
    <div class="text-center mb-4">
      <h2 class="section-title">Menu Kami</h2>
    </div>
    
    <!-- Category Filter -->
    @if($categories->count() > 0)
    <div class="mb-4 text-center">
      <div class="btn-group flex-wrap" role="group">
        <button type="button" class="btn btn-outline-primary active category-filter-btn" data-category="all">Semua</button>
        @foreach($categories as $category)
          <button type="button" class="btn btn-outline-primary category-filter-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
        @endforeach
      </div>
    </div>
    @endif

    <!-- Menu Grid -->
    <div class="row g-3 g-md-4" id="menuGrid">
      @forelse($allMenus as $menu)
        <div class="col-6 col-md-4 col-lg-3 menu-item" data-category="{{ $menu->category_id }}">
          <div class="card menu-card h-100">
            @if($menu->image)
              <img src="{{ asset('storage/'.$menu->image) }}" class="card-img-top menu-img" alt="{{ $menu->name }}">
            @else
              <div class="card-img-top menu-img bg-light d-flex align-items-center justify-content-center">
                <span class="text-muted fs-1">🍽️</span>
              </div>
            @endif
            <div class="card-body text-center">
              <h6 class="card-title mb-2">{{ $menu->name }}</h6>
              <p class="menu-price mb-0">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="text-center py-5">
            <p class="text-muted">Belum ada menu tersedia</p>
          </div>
        </div>
      @endforelse
    </div>
  </div>

  <!-- Simple Filter Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const filterButtons = document.querySelectorAll('.category-filter-btn');
      const menuItems = document.querySelectorAll('.menu-item');
      
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Update active button
          filterButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');
          
          const category = this.getAttribute('data-category');
          
          // Filter menu items
          menuItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
              item.style.display = '';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
      
      // Smooth scroll
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        });
      });
    });
  </script>
@endsection
