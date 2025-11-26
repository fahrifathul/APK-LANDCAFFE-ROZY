@extends('public.layouts.app')

@section('title', 'Menu - LandCaffe')

@section('content')
<div class="hero mb-4 position-relative">
    <div class="hero-overlay"></div>
    <div class="container py-5 hero-content">
        <div class="hero-content-inner text-center">
            <div class="brand-pill mb-3 d-inline-flex">Menu Kami</div>
            <h1 class="display-6 fw-bold mb-3">Temukan menu favoritmu</h1>
            <p class="lead">Setiap orang punya rasa yang berbeda, dan di sinilah keistimewaannya. Dari kopi klasik yang hangat hingga kreasi modern yang menyegarkan.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="mb-4">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="btn-group" role="group">
                <a href="{{ route('public.menu') }}" class="btn {{ $categoryId ? 'btn-outline-secondary' : 'btn-primary' }}">Semua</a>
                @foreach($categories as $cat)
                    <a href="{{ route('public.menu', ['category' => $cat->id]) }}" 
                       class="btn {{ (int)$categoryId === (int)$cat->id ? 'btn-primary' : 'btn-outline-secondary' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @if($menus->count() === 0)
        <div class="alert alert-info">Tidak ada menu ditemukan.</div>
    @else
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    @if($menu->image)
                        <img src="{{ asset('storage/'.$menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 150px; object-fit: cover;">
                    @else
                        <div class="bg-light" style="height: 150px;"></div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title mb-1 text-dark">{{ $menu->name }}</h5>
                        <p class="text-muted small mb-2">{{ $menu->category?->name }}</p>
                        <p class="card-text small text-muted">{{ \Illuminate\Support\Str::limit($menu->description, 60) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold text-dark">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            <span class="badge badge-success">Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $menus->links() }}
        </div>
    @endif
</div>

<style>
    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 55%, #ffffff 100%);
        min-height: 340px;
        color: #fff;
        border-radius: 16px 16px 16px 16px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0,0,0,.08);
        margin: 1.5rem 0 0;
    }
    
    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(1200px 300px at -10% 120%, rgba(255,255,255,.30), rgba(255,255,255,0));
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        color: #fff;
        padding: 3.5rem 1rem;
    }
    
    .brand-pill {
        
        color: #ffffffff;
        padding: 0.5rem 1.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 1);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    
    .hero h1 {
        color: #fff;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        line-height: 1.2;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .hero p {
        color: rgba(255,255,255,0.9);
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    
    /* Menu Cards */
    .card {
        border: 1px solid rgba(0, 100, 0, 0.1);
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
        height: 100%;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 100, 0, 0.03);
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 100, 0, 0.08);
        border-color: rgba(0, 128, 0, 0.2);
    }
    
    .card-img-top {
        height: 200px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.3s ease;
    }
    
    .card:hover .card-img-top {
        transform: scale(1.03);
    }
    
    .card-body {
        padding: 1.25rem;
        background: #fff;
        border-top: 1px solid rgba(0, 100, 0, 0.05);
    }
    
    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1b5e20;
    }
    
    .card-text {
        color: #2e7d32;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        line-height: 1.6;
        opacity: 0.9;
    }
    
    .badge {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.35rem 0.8rem;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background-color: #43a047;
        color: white;
    }
    
    /* Category Buttons */
    .btn-group {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .btn-group .btn {
        margin: 0.25rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-outline-secondary {
        color: #2e7d32;
        border-color: #a5d6a7;
        background-color: #fff;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-outline-secondary:hover {
        background-color: #e8f5e9;
        border-color: #81c784;
        color: #1b5e20;
    }
    
    .btn-primary {
        background-color: #2e7d32;
        border-color: #2e7d32;
        color: #fff;
    }
    
    .btn-primary:hover {
        background-color: #1b5e20;
        border-color: #1b5e20;
        color: #fff;
    }
    
    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .hero h1 {
            font-size: 2rem;
        }
        
        .hero p {
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 991.98px) {
        .hero {
            margin: 0 0 2rem;
        }
        
        .hero-content {
            padding: 3rem 1rem;
        }
        
        .card {
            margin-bottom: 1.5rem;
        }
    }
    
    @media (max-width: 767.98px) {
        .hero h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1rem;
            padding: 0 1rem;
        }
        
        .btn-group .btn {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        .card {
            margin-bottom: 1rem;
        }
        
        .card-img-top {
            height: 180px !important;
        }
        
        .card-title {
            font-size: 1rem;
        }
        
        .card-text {
            font-size: 0.8rem;
        }
    }
</style>
@endsection
