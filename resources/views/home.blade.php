@extends('public.layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="hero-welcome-modern">
    <div class="hero-particles"></div>
    <div class="hero-welcome-overlay-modern"></div>
    <div class="container h-100">
      <div class="row align-items-center h-100">
        <div class="col-12">
          <div class="hero-content-wrapper mx-auto">
            <div class="hero-badge mb-3 mb-md-4">
              <i class="fas fa-coffee hero-badge-icon"></i>
              <span>Selamat Datang di LandCaffe</span>
            </div>
            
            <h1 class="hero-welcome-title-modern mb-3 mb-md-4">
              Nikmati Secangkir Kopi <br class="d-none d-md-block">
              <span class="hero-highlight">Terbaik</span> di Kota Ini
            </h1>
            
            <p class="hero-subtitle-modern mb-4 mb-md-5" style="color: #ffffff !important; text-shadow: none !important; font-size: 1.1rem; line-height: 1.6;">
              Temukan berbagai varian kopi pilihan dan hidangan lezat yang siap menemani harimu
            </p>
            
            <!-- Search Bar -->
            <form action="{{ route('public.menu') }}" method="GET" class="search-section-modern mb-4 mb-md-5">
              <div class="search-wrapper-modern">
                <i class="fas fa-search search-icon-modern"></i>
                <input type="text" name="q" class="search-input-modern" placeholder="Cari menu favoritmu..." value="{{ request('q') }}" required>
                <button type="submit" class="search-button-modern">
                  <i class="fas fa-search me-0 me-md-2"></i>
                  <span class="d-none d-md-inline">Cari</span>
                </button>
              </div>
            </form>
            
            <div class="hero-actions justify-content-center flex-wrap">
              <a href="{{ route('public.menu') }}" class="btn-hero-primary mb-2 mb-md-0">
                <span>Lihat Menu</span>
                <i class="fas fa-arrow-right ms-2"></i>
              </a>
              <a href="{{ route('login') }}" class="btn-hero-secondary">
                <i class="fas fa-phone-alt me-2"></i>
                <span>Pesan Sekarang</span>
              </a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <!-- Custom CSS for the new design -->
  <style>
    /* Modern Hero Section */
    .hero-welcome-modern {
      position: relative;
      min-height: 100vh;
      padding: 100px 0;
      margin-top: -76px; /* Offset for fixed navbar */
      z-index: 1;
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), 
                  url('/images/hero/backgroundwelcome.jpeg') no-repeat center center;
      background-size: cover;
      background-attachment: fixed;
      overflow: hidden;
      display: flex;
      align-items: center;
      text-align: center;
    }
    
    .hero-particles {
      position: absolute;
      inset: 0;
      background-image: 
        radial-gradient(circle at 20% 30%, rgba(255,255,255,0.1) 1px, transparent 1px),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.08) 1px, transparent 1px),
        radial-gradient(circle at 40% 80%, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 80px 80px, 120px 120px, 160px 160px;
      animation: particleFloat 30s linear infinite;
      pointer-events: none;
      opacity: 0.5;
    }
    
    @keyframes particleFloat {
      0% { opacity: 0.5; transform: translateY(0) translateX(0); }
      50% { opacity: 0.8; }
      100% { opacity: 0.5; transform: translateY(-50px) translateX(20px); }
    }
    
    .hero-welcome-overlay-modern {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, 
                                      rgba(0, 0, 0, 0.5) 50%,
                                      rgba(0, 0, 0, 0.3) 100%);
      z-index: 1;
    }
    
    .hero-content-wrapper {
      position: relative;
      z-index: 2;
      max-width: 900px;
      margin: 0 auto;
      text-align: center;
      padding: 60px 30px;
      width: 100%;
      backdrop-filter: blur(2px);
    }
    
    .hero-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 0.6rem 1.3rem;
      border-radius: 50px;
      color: #ffffff;
      font-size: 0.9rem;
      font-weight: 600;
      margin: 0 auto 1.5rem;
      transition: all 0.3s ease;
      position: relative;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      letter-spacing: 0.5px;
    }
    
    @media (min-width: 768px) {
      .hero-badge {
        gap: 0.75rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.95rem;
        margin-bottom: 1.75rem;
      }
    }
    
    .hero-badge-icon {
      color: #e8f5e9;
    }
    
    .hero-welcome-title-modern {
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
      margin: 0 auto 2rem;
      font-family: 'Playfair Display', serif;
      max-width: 900px;
      letter-spacing: -0.5px;
      padding: 0 1rem;
    }
    
    @media (min-width: 768px) {
      .hero-welcome-title-modern {
        font-size: 3.2rem;
        line-height: 1.15;
        margin-bottom: 1.8rem;
        padding: 0 2rem;
      }
      .hero-welcome-modern {
        padding: 100px 0 80px;
      }
      .hero-subtitle-modern {
        font-size: 1.1rem;
        margin-bottom: 2.5rem;
      }
      .search-section-modern {
        margin-bottom: 2.5rem;
      }
    }
    
    .hero-highlight {
      display: inline-block;
      background: linear-gradient(135deg, #e8f5e9, #a5d6a7, #81c784);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      position: relative;
      z-index: 1;
    }
    
    .hero-subtitle-modern {
      font-size: 1.2rem;
      color: #ffffff;
      margin: 0 auto 3rem;
      max-width: 700px;
      line-height: 1.8;
      font-weight: 400;
      padding: 0 2rem;
      text-shadow: 0 1px 5px rgba(0, 0, 0, 0.4);
    }
    
    @media (min-width: 768px) {
      .hero-subtitle-modern {
        font-size: 1.25rem;
        margin-bottom: 4rem;
        padding: 0;
      }
    }
    
    /* Modern Search Section */
    .search-section-modern {
      max-width: 100%;
      margin: 0 auto 2rem;
      padding: 0 1rem;
    }
    
    @media (min-width: 768px) {
      .search-section-modern {
        max-width: 650px;
        margin-bottom: 4rem;
        padding: 0;
      }
    }
    
    .search-wrapper-modern {
      position: relative;
      display: flex;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 50px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .search-icon-modern {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: #4caf50;
    }
    
    .search-input-modern {
      flex: 1;
      border: none;
      padding: 1rem 1.5rem 1rem 3rem;
      font-size: 1rem;
      outline: none;
      background: transparent;
    }
    
    .search-button-modern {
      padding: 0.75rem 1.25rem;
      background: linear-gradient(135deg, #8bc34a, #689f38);
      color: white;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
      white-space: nowrap;
      min-width: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    @media (min-width: 768px) {
      .search-button-modern {
        padding: 0.75rem 1.5rem;
        min-width: auto;
      }
    }
    
    .search-button-modern:hover {
      background: linear-gradient(135deg, #7cb342, #558b2f);
    }
    
    /* Hero Buttons */
    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 1.2rem;
      justify-content: center;
      margin: 3rem 0 1rem;
      padding: 0 1rem;
    }
    
    @media (min-width: 768px) {
      .hero-actions {
        gap: 1rem;
        padding: 0;
      }
    }
    
    .btn-hero-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 180px;
      gap: 0.6rem;
      background: linear-gradient(135deg, #43a047, #2e7d32);
      color: #ffffff;
      padding: 1rem 2.2rem;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: none;
      cursor: pointer;
      font-size: 1.05rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
      position: relative;
      overflow: hidden;
      z-index: 1;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    .btn-hero-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #9ccc65, #7cb342);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: -1;
    }
    
    .btn-hero-primary:hover::before {
      opacity: 1;
    }
    
    .btn-hero-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(76, 175, 80, 0.4);
      color: #fff;
    }
    
    .btn-hero-secondary {
      display: inline-flex;
      align-items: center;
      gap: 0.7rem;
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff;
      padding: 1rem 2.2rem;
      border-radius: 50px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      z-index: 1;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    .btn-hero-secondary::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.15);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: -1;
    }
    
    .btn-hero-secondary:hover::before {
      opacity: 1;
    }
    
    .btn-hero-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      transform: translateY(-3px);
    }
    
    /* Hero Image */
    .hero-image-wrapper {
      position: relative;
      z-index: 2;
      padding: 0 1rem;
      margin: 3rem auto 0;
      max-width: 600px;
      animation: float 6s ease-in-out infinite;
    }
    
    @media (min-width: 768px) {
      .hero-image-wrapper {
        padding: 0 15px;
        margin: 4rem auto 0;
        max-width: 800px;
      }
    }
    
    @media (min-width: 1200px) {
      .hero-image-wrapper {
        max-width: 900px;
      }
    }
    
    .hero-main-image {
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
      position: relative;
      z-index: 2;
      max-width: 100%;
      height: auto;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hero-main-image:hover {
      transform: translateY(-5px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
    }
    
    /* Animation for hero image */
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    
    /* Modern Category Cards */
    .category-card-modern {
      background: white;
      border-radius: 15px;
      padding: 2rem 1.5rem;
      text-align: center;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }
    
    .category-card-modern::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      opacity: 0;
      transition: all 0.3s ease;
      z-index: -1;
    }
    
    .category-card-modern:hover::before {
      opacity: 1;
    }
    
    .category-card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(76, 175, 80, 0.15);
    }
    
    .category-icon-modern {
      width: 80px;
      height: 80px;
      background: #f0f9f0;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.25rem;
      font-size: 28px;
      color: #4caf50;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .category-card-modern:hover .category-icon-modern {
      background: #4caf50;
      color: white;
      transform: scale(1.1) rotate(5deg);
    }
    
    .category-card-modern h5 {
      margin: 0;
      font-weight: 600;
      color: #2d1810;
      font-size: 1.1rem;
      position: relative;
    }
    
    /* Section Styling */
    .section-title {
      position: relative;
      display: inline-block;
      margin-bottom: 1rem;
      font-weight: 700;
      color: #2d1810;
      font-size: 2rem;
    }
    
    .section-title:after {
      content: '';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -10px;
      width: 50px;
      height: 3px;
      background: #4caf50;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
      .hero-welcome-modern {
        text-align: center;
        padding: 120px 0 60px;
      }
      
      .hero-content-wrapper {
        margin: 0 auto;
        max-width: 600px;
      }
      
      .hero-actions {
        justify-content: center;
      }
      
      .floating-card {
        display: none;
      }
    }
    
    @media (max-width: 767.98px) {
      .hero-welcome-title-modern {
        font-size: 2.2rem;
      }
      
      .hero-subtitle-modern {
        font-size: 1.1rem;
      }
      
      .search-button-modern span {
        display: none;
      }
      
      .search-button-modern i {
        margin: 0;
      }
      
      .btn-hero-primary,
      .btn-hero-secondary {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
      }
    }
    
    @media (max-width: 575.98px) {
      .hero-welcome-title-modern {
        font-size: 1.8rem;
      }
      
      .hero-badge {
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
      }
      
      .search-wrapper-modern {
        flex-direction: column;
        border-radius: 15px;
        overflow: hidden;
      }
      
      .search-input-modern {
        padding: 0.8rem 1.5rem 0.8rem 3rem;
      }
      
      .search-button-modern {
        padding: 0.8rem;
        justify-content: center;
      }
      
      .search-button-modern i {
        margin: 0;
      }
      
      .hero-actions {
        flex-direction: column;
        gap: 0.75rem;
      }
      
      .btn-hero-primary,
      .btn-hero-secondary {
        justify-content: center;
        width: 100%;
      }
    }
  </style>
  
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
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
