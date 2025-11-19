@extends('public.layouts.app')

@section('title', 'Menu - LandCaffe')

@section('content')
  <div class="hero mb-4 position-relative" style="display: flex; align-items: center; min-height: 340px;">
    <div class="hero-overlay"></div>
    <div class="container py-5 hero-content">
      <div class="hero-content-inner text-center" style="padding-top: 30px;">
        <h1 class="display-6 fw-bold mb-4">Temukan menu favoritmu</h1>
        <p class="lead mx-auto" style="max-width: 800px;">Setiap orang punya rasa yang berbeda, dan di sinilah keistimewaannya. Dari kopi klasik yang hangat hingga kreasi modern yang menyegarkan, setiap menu kami dibuat dari biji pilihan dengan sentuhan istimewa.</p>
      </div>
    </div>
  </div>

  <div class="mb-3 d-flex flex-wrap align-items-center">
    <span class="me-2 fw-semibold">Kategori:</span>
    <a class="category-chip {{ $categoryId ? '' : 'active' }}" href="{{ route('public.menu') }}">Semua</a>
    @foreach($categories as $cat)
      <a class="category-chip {{ (int)$categoryId === (int)$cat->id ? 'active' : '' }}" href="{{ route('public.menu', ['category' => $cat->id]) }}">{{ $cat->name }}</a>
    @endforeach
  </div>

  @if($menus->count() === 0)
    <div class="alert alert-info">Tidak ada menu ditemukan.</div>
  @else
    <div class="row g-3">
      @foreach($menus as $menu)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card h-100 border-0 shadow-sm menu-card">
            @if($menu->image)
              <img src="{{ asset('storage/'.$menu->image) }}" class="menu-img" alt="{{ $menu->name }}">
            @else
              <div class="bg-light menu-img"></div>
            @endif
            <div class="card-body d-flex flex-column menu-card-body">
              <div class="small text-muted">{{ $menu->category?->name }}</div>
              <h5 class="card-title mt-1">{{ $menu->name }}</h5>
              @if($menu->description)
                <p class="card-text small text-muted">{{ \Illuminate\Support\Str::limit($menu->description, 100) }}</p>
              @endif
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="menu-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                <span class="badge menu-badge">Tersedia</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      <div class="pagination-wrapper">
        {{ $menus->links() }}
      </div>
    </div>
  @endif
@endsection
