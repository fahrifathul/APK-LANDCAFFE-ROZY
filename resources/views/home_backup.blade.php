@extends('public.layouts.app')

@section('content')
  <!-- Hero Section - Simple & Clean -->
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

  <!-- Search Section -->
  <div class="mb-4 mb-md-5">
    <div class="search-section-modern">
      <div class="search-icon-wrapper">
        <svg viewBox="0 0 24 24" fill="none">
          <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
          <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </div>
      <input type="text" id="menuSearch" class="search-input-modern" placeholder="Cari menu favorit Anda..." autocomplete="off">
      <button type="button" id="clearSearch" class="search-clear-btn" style="display: none;">
        <svg viewBox="0 0 20 20" fill="none">
          <path d="M15 5L5 15M5 5L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
      <div class="search-suggestions" id="searchSuggestions">
        <span class="search-tag" data-search="kopi">Kopi</span>
        <span class="search-tag" data-search="latte">Latte</span>
        <span class="search-tag" data-search="cappuccino">Cappuccino</span>
        <span class="search-tag" data-search="americano">Americano</span>
      </div>
      <div class="search-results-count" id="searchResultsCount" style="display: none;"></div>
    </div>
  </div>

  <!-- Featured Section - Hidden if no menus -->
  @if(isset($favoriteMenus) && $favoriteMenus->count() > 0)
  <div class="mb-5">
    <div class="text-center mb-4">
      <h2 class="section-title">Menu Unggulan</h2>
      <p class="text-muted">Pilihan favorit pelanggan kami</p>
    </div>
    <div class="row g-4">
      @if(isset($favoriteMenus) && $favoriteMenus->count() >= 3)
        @foreach($favoriteMenus->take(3) as $index => $menu)
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <div class="featured-card-modern">
              <div class="featured-image-wrapper">
                @if($menu->image)
                  <img src="{{ asset('storage/'.$menu->image) }}" class="featured-img-modern" alt="{{ $menu->name }}">
                @else
                  <div class="featured-img-modern featured-img-placeholder">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                      <path d="M40 10C23.43 10 10 23.43 10 40C10 56.57 23.43 70 40 70C56.57 70 70 56.57 70 40C70 23.43 56.57 10 40 10ZM40 25C42.76 25 45 27.24 45 30C45 32.76 42.76 35 40 35C37.24 35 35 32.76 35 30C35 27.24 37.24 25 40 25ZM50 52.5H30V47.5H35V40H32.5V35H42.5V47.5H47.5V52.5H50Z" fill="currentColor" opacity="0.2"/>
                    </svg>
                  </div>
                @endif
                <div class="featured-badge">Popular</div>
              </div>
              <div class="featured-body-modern">
                <h5 class="featured-title-modern">{{ $menu->name }}</h5>
                <p class="featured-desc-modern">{{ $menu->description ?? 'Enjoy our delicious ' . strtolower($menu->name) }}</p>
                <div class="featured-footer">
                  <div class="featured-rating">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                      <path d="M8 1L10.163 5.38L15 6.12L11.5 9.54L12.326 14.36L8 12.1L3.674 14.36L4.5 9.54L1 6.12L5.837 5.38L8 1Z"/>
                    </svg>
                    <span>4.8</span>
                  </div>
                  <button class="btn-featured-action">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                      <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <!-- Fallback if no menus available -->
        <div class="col-md-4" data-aos="fade-up">
          <div class="featured-card-modern">
            <div class="featured-image-wrapper">
              <div class="featured-img-modern featured-img-placeholder">☕</div>
              <div class="featured-badge">Popular</div>
            </div>
            <div class="featured-body-modern">
              <h5 class="featured-title-modern">Iced Coffee</h5>
              <p class="featured-desc-modern">Cool down with our refreshing iced coffee.</p>
              <div class="featured-footer">
                <div class="featured-rating">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 1L10.163 5.38L15 6.12L11.5 9.54L12.326 14.36L8 12.1L3.674 14.36L4.5 9.54L1 6.12L5.837 5.38L8 1Z"/>
                  </svg>
                  <span>4.8</span>
                </div>
                <button class="btn-featured-action">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="featured-card-modern">
            <div class="featured-image-wrapper">
              <div class="featured-img-modern featured-img-placeholder">🥐</div>
              <div class="featured-badge">Popular</div>
            </div>
            <div class="featured-body-modern">
              <h5 class="featured-title-modern">Fresh Pastries</h5>
              <p class="featured-desc-modern">Start your day with our freshly baked pastries.</p>
              <div class="featured-footer">
                <div class="featured-rating">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 1L10.163 5.38L15 6.12L11.5 9.54L12.326 14.36L8 12.1L3.674 14.36L4.5 9.54L1 6.12L5.837 5.38L8 1Z"/>
                  </svg>
                  <span>4.9</span>
                </div>
                <button class="btn-featured-action">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="featured-card-modern">
            <div class="featured-image-wrapper">
              <div class="featured-img-modern featured-img-placeholder">🥪</div>
              <div class="featured-badge">Popular</div>
            </div>
            <div class="featured-body-modern">
              <h5 class="featured-title-modern">Gourmet Sandwiches</h5>
              <p class="featured-desc-modern">Enjoy a delicious gourmet sandwich for lunch.</p>
              <div class="featured-footer">
                <div class="featured-rating">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 1L10.163 5.38L15 6.12L11.5 9.54L12.326 14.36L8 12.1L3.674 14.36L4.5 9.54L1 6.12L5.837 5.38L8 1Z"/>
                  </svg>
                  <span>4.7</span>
                </div>
                <button class="btn-featured-action">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
  @endif

  <!-- Menu Section -->
  <div class="mb-5" id="menu-section">
    <div class="text-center mb-4">
      <h2 class="section-title">Menu Kami</h2>
      <p class="text-muted">Temukan menu favorit Anda</p>
    </div>
    
    <!-- Category Filter - Simple Pills -->
    @if($categories->count() > 0)
    <div class="mb-4 text-center">
      <div class="btn-group flex-wrap" role="group">
        <button type="button" class="btn btn-outline-primary active" data-filter="all">Semua</button>
        @foreach($categories as $category)
          <button type="button" class="btn btn-outline-primary" data-filter="cat-{{ $category->id }}">{{ $category->name }}</button>
        @endforeach
      </div>
    </div>
    @endif

    <!-- Tab Content -->
    <div class="tab-content" id="menuTabContent">
      <!-- All Menus -->
      <div class="tab-pane fade show active" id="all" role="tabpanel">
        <div class="row g-4">
          @foreach($allMenus as $menu)
            <div class="col-6 col-md-4 col-lg-3">
              <div class="menu-item-card-modern">
                <div class="menu-item-image-wrapper">
                  @if($menu->image)
                    <img src="{{ asset('storage/'.$menu->image) }}" class="menu-item-img-modern" alt="{{ $menu->name }}">
                  @else
                    <div class="menu-item-img-modern menu-item-placeholder">
                      <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M24 6C14.06 6 6 14.06 6 24C6 33.94 14.06 42 24 42C33.94 42 42 33.94 42 24C42 14.06 33.94 6 24 6ZM24 15C26.21 15 28 16.79 28 19C28 21.21 26.21 23 24 23C21.79 23 20 21.21 20 19C20 16.79 21.79 15 24 15ZM30 31.5H18V28.5H21V24H19.5V21H25.5V28.5H28.5V31.5H30Z" fill="currentColor" opacity="0.3"/>
                      </svg>
                    </div>
                  @endif
                  <div class="menu-item-overlay">
                    <button class="btn-menu-view">Lihat Detail</button>
                  </div>
                </div>
                <div class="menu-item-body-modern">
                  <h6 class="menu-item-name-modern">{{ $menu->name }}</h6>
                  @if($menu->price)
                    <div class="menu-item-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Category Menus -->
      @foreach($categories as $category)
        <div class="tab-pane fade" id="cat-{{ $category->id }}" role="tabpanel">
          <div class="row g-4">
            @forelse($category->menus as $menu)
              <div class="col-6 col-md-4 col-lg-3">
                <div class="menu-item-card-modern">
                  <div class="menu-item-image-wrapper">
                    @if($menu->image)
                      <img src="{{ asset('storage/'.$menu->image) }}" class="menu-item-img-modern" alt="{{ $menu->name }}">
                    @else
                      <div class="menu-item-img-modern menu-item-placeholder">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                          <path d="M24 6C14.06 6 6 14.06 6 24C6 33.94 14.06 42 24 42C33.94 42 42 33.94 42 24C42 14.06 33.94 6 24 6ZM24 15C26.21 15 28 16.79 28 19C28 21.21 26.21 23 24 23C21.79 23 20 21.21 20 19C20 16.79 21.79 15 24 15ZM30 31.5H18V28.5H21V24H19.5V21H25.5V28.5H28.5V31.5H30Z" fill="currentColor" opacity="0.3"/>
                        </svg>
                      </div>
                    @endif
                    <div class="menu-item-overlay">
                      <button class="btn-menu-view">Lihat Detail</button>
                    </div>
                  </div>
                  <div class="menu-item-body-modern">
                    <h6 class="menu-item-name-modern">{{ $menu->name }}</h6>
                    @if($menu->price)
                      <div class="menu-item-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                    @endif
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12">
                <div class="empty-state">
                  <div class="empty-state-icon">📭</div>
                  <h4 class="empty-state-title">Belum Ada Menu</h4>
                  <p class="empty-state-text">Kategori ini belum memiliki menu. Silakan cek kategori lainnya.</p>
                </div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>
  </div>


  <!-- Search & Interaction Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // ========== Elements ==========
      const searchInput = document.getElementById('menuSearch');
      const clearSearchBtn = document.getElementById('clearSearch');
      const searchResultsCount = document.getElementById('searchResultsCount');
      const searchSuggestions = document.querySelectorAll('.search-tag');
      const menuSection = document.querySelector('.tab-content');
      const menuCards = document.querySelectorAll('.menu-item-card-modern');
      const categoryTabs = document.querySelectorAll('.category-tab-btn');
      
      let searchTimeout = null;
      
      // ========== Search Functionality ==========
      function performSearch(searchTerm) {
        searchTerm = searchTerm.toLowerCase().trim();
        let visibleCount = 0;
        
        // Show all tabs content when searching
        if (searchTerm) {
          document.querySelectorAll('.tab-pane').forEach(pane => {
            pane.classList.add('show', 'active');
          });
        }
        
        menuCards.forEach(card => {
          const menuName = card.querySelector('.menu-item-name-modern').textContent.toLowerCase();
          const parentCol = card.closest('.col-6, .col-md-4, .col-lg-3');
          
          if (!searchTerm || menuName.includes(searchTerm)) {
            parentCol.style.display = '';
            card.style.opacity = '0';
            setTimeout(() => {
              card.style.transition = 'opacity 0.3s ease';
              card.style.opacity = '1';
            }, 10);
            visibleCount++;
          } else {
            parentCol.style.display = 'none';
          }
        });
        
        // Update results count
        if (searchTerm) {
          searchResultsCount.textContent = `${visibleCount} menu ditemukan`;
          searchResultsCount.style.display = 'block';
        } else {
          searchResultsCount.style.display = 'none';
        }
        
        // Remove existing no results message
        const existingMsg = document.querySelector('.no-results-message');
        if (existingMsg) existingMsg.remove();
        
        // Show no results message
        if (visibleCount === 0 && searchTerm) {
          const activePane = document.querySelector('.tab-pane.active');
          const noResultsMsg = document.createElement('div');
          noResultsMsg.className = 'no-results-message empty-state';
          noResultsMsg.innerHTML = `
            <div class="empty-state-icon">🔍</div>
            <h4 class="empty-state-title">Menu "${searchTerm}" tidak ditemukan</h4>
            <p class="empty-state-text">Coba kata kunci lain atau klik salah satu saran pencarian di atas</p>
          `;
          if (activePane) {
            activePane.appendChild(noResultsMsg);
          }
        }
        
        // Toggle clear button
        clearSearchBtn.style.display = searchTerm ? 'flex' : 'none';
      }
      
      // Search input with debounce
      searchInput.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
          performSearch(e.target.value);
        }, 300);
      });
      
      // Clear search button
      clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        performSearch('');
        searchInput.focus();
      });
      
      // Search suggestions
      searchSuggestions.forEach(tag => {
        tag.addEventListener('click', function() {
          const searchTerm = this.getAttribute('data-search') || this.textContent;
          searchInput.value = searchTerm;
          performSearch(searchTerm);
          searchInput.focus();
        });
      });
      
      // ========== Category Filter Buttons ==========
      const filterButtons = document.querySelectorAll('[data-filter]');
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Update active state
          filterButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');
          
          const filter = this.getAttribute('data-filter');
          
          // Show/hide tab panes
          document.querySelectorAll('.tab-pane').forEach(pane => {
            if (filter === 'all') {
              pane.classList.remove('show', 'active');
              document.getElementById('all').classList.add('show', 'active');
            } else if (pane.id === filter) {
              pane.classList.remove('show', 'active');
              setTimeout(() => pane.classList.add('show', 'active'), 10);
            }
          });
        });
      });

      // ========== Smooth Scroll ==========
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            const offset = 80; // Navbar height
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({
              top: targetPosition,
              behavior: 'smooth'
            });
          }
        });
      });

      // ========== Scroll Animations ==========
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
          }
        });
      }, observerOptions);

      document.querySelectorAll('.featured-card-modern, .menu-item-card-modern, .about-home-section-modern').forEach(el => {
        observer.observe(el);
      });
      
      // ========== Keyboard Shortcuts ==========
      document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K to focus search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
          e.preventDefault();
          searchInput.focus();
        }
        // Escape to clear search
        if (e.key === 'Escape' && searchInput.value) {
          searchInput.value = '';
          performSearch('');
          searchInput.blur();
        }
      });
    });
  </script>
@endsection
