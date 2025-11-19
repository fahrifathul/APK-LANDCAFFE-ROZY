<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'LandCaffe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
      :root{
        --green:#4CAF50;
        --green-600:#2E7D32;
        --green-50:#E8F5E9;
        --latte:#e8f5e9;
        --latte-50:#f1f8f1;
        --bg:#ffffff; /* content background */
        --bg-soft:#f1f8f1; /* soft green */
        --text:#111827;
        --muted:#6b7280;
        --border:#c8e6c9;
      }
      .logo-script{ font-family: 'Great Vibes', cursive; letter-spacing: .5px; font-size:1.6rem; }
      .elegant-serif{ font-family: 'Playfair Display', serif; letter-spacing:.2px; }
      /* Layout */
      .admin-wrap{ display:flex; min-height:100vh; background: var(--bg-soft); }
      .admin-sidebar{ width:250px; background:#ffffff; color:#1f2937; padding:18px 14px; display:flex; flex-direction:column; gap:10px; border-right:1px solid var(--border); border-top-right-radius:16px; border-bottom-right-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.06); }
      .admin-brand{ display:flex; flex-direction:column; align-items:center; justify-content:center; gap:4px; padding:12px 10px; text-align:center; margin-bottom:4px; }
      .admin-brand .title{ font-weight:800; font-size:20px; color:var(--green-600); line-height:1.1; }
      .admin-brand small{ color:#6b7280; margin-top:6px; }
      .nav-caption{ color:#6b7280; font-size:.9rem; margin:0 auto 8px auto; text-align:center; font-weight:600; font-family: 'Playfair Display', serif; }
      .admin-nav{ display:flex; flex-direction:column; gap:6px; }
      .admin-nav a{ display:flex; align-items:center; gap:10px; padding:10px 12px; color:#1f2937; text-decoration:none; border-radius:10px; transition: all .15s ease; }
      .admin-nav a:hover{ background:var(--latte-50); }
      .admin-nav a.active{ background:linear-gradient(135deg, var(--green-50), #fff); border:1px solid var(--green-600); color:var(--green-600); font-weight:700; }
      .sidebar-footer{ margin-top:auto; padding:8px 4px; }
      .admin-content{ flex:1; padding:22px; background: var(--bg-soft); color:var(--text); border-left:1px solid var(--border); }
      .page-head{ display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; }
      .page-title{ font-weight:800; font-size:30px; color:var(--green-600); font-family: 'Playfair Display', serif; letter-spacing:.2px; }
      .table thead th{ font-family: 'Playfair Display', serif; letter-spacing:.2px; }
      .admin-card{ background:#fff; border:1px solid var(--border); border-radius:16px; box-shadow:0 18px 40px rgba(2,6,23,.08); color:var(--text); }
      .btn-primary{ background: linear-gradient(135deg, var(--green), var(--green-600)); border:0; box-shadow:0 10px 22px rgba(46, 125, 50, 0.3); border-radius:12px; color:#fff; font-weight:700; }
      .btn-primary:hover{ filter:brightness(1.05); }
      .btn-pill{ border-radius:999px; }
      .table-wrap{ background:#fff; border:1px solid var(--border); border-radius:16px; box-shadow:0 18px 40px rgba(2,6,23,.08); overflow:hidden; }
      .table{ margin:0; color:var(--text); }
      .table thead th{ background:var(--green-50); border-color:var(--border); color:var(--green-600); font-weight:700; }
      .table tbody td, .table tbody th{ border-color:var(--border); }
      .table tbody tr:hover{ background:var(--green-50); }
      
      /* Clean Pagination Styles - Force Override Bootstrap */
      .pagination-wrapper{ 
        width:100% !important; 
        display:flex !important; 
        justify-content:center !important;
        align-items:center !important;
        padding:1.5rem 0 !important;
        overflow-x:auto !important;
        -webkit-overflow-scrolling:touch !important;
      }
      
      /* Target all pagination variations */
      .pagination, 
      nav[role="navigation"] ul,
      ul.pagination{ 
        margin:0 !important; 
        padding:0 !important;
        list-style:none !important;
        display:flex !important;
        flex-direction:row !important;
        flex-wrap:nowrap !important; 
        gap:8px !important; 
        align-items:center !important;
        justify-content:center !important;
      }
      
      .pagination li,
      .pagination .page-item,
      nav[role="navigation"] ul li,
      ul.pagination li{ 
        margin:0 !important; 
        padding:0 !important;
        display:inline-flex !important;
        float:none !important;
        flex-shrink:0 !important;
      }
      
      .pagination a,
      .pagination span,
      .pagination .page-link,
      nav[role="navigation"] ul li a,
      nav[role="navigation"] ul li span,
      ul.pagination li a,
      ul.pagination li span{ 
        border-radius:8px !important; 
        border:1px solid transparent !important; 
        color:#64748b !important; 
        padding:0.5rem 0.75rem !important; 
        min-width:40px !important; 
        height:40px !important;
        display:inline-flex !important;
        align-items:center !important;
        justify-content:center !important;
        text-align:center !important;
        font-weight:500 !important;
        transition:all 0.2s ease !important;
        background:#fff !important;
        white-space:nowrap !important;
        font-size:0.95rem !important;
        text-decoration:none !important;
        line-height:1 !important;
        box-sizing:border-box !important;
        margin:0 !important;
      }
      
      .pagination a:hover,
      .pagination .page-link:hover:not(.disabled),
      nav[role="navigation"] ul li a:hover,
      ul.pagination li a:hover{ 
        background:#f8fafc !important; 
        color:var(--green-600) !important;
        border-color:#e2e8f0 !important;
      }
      
      .pagination .active span,
      .pagination .page-item.active .page-link,
      nav[role="navigation"] ul li.active span,
      nav[role="navigation"] ul li[aria-current="page"] span,
      ul.pagination li.active span{ 
        background:var(--green) !important; 
        border-color:var(--green) !important; 
        color:#fff !important; 
        font-weight:600 !important;
      }
      
      .pagination .disabled span,
      .pagination .page-item.disabled .page-link,
      nav[role="navigation"] ul li.disabled span,
      ul.pagination li.disabled span{ 
        opacity:0.4 !important; 
        cursor:not-allowed !important; 
        background:#fff !important;
        pointer-events:none !important;
      }
      
      /* Previous & Next text buttons - replace symbols with text */
      .pagination li:first-child a,
      .pagination li:first-child span,
      .pagination li:last-child a,
      .pagination li:last-child span,
      .pagination .page-item:first-child .page-link,
      .pagination .page-item:last-child .page-link,
      nav[role="navigation"] ul li:first-child a,
      nav[role="navigation"] ul li:first-child span,
      nav[role="navigation"] ul li:last-child a,
      nav[role="navigation"] ul li:last-child span,
      ul.pagination li:first-child a,
      ul.pagination li:first-child span,
      ul.pagination li:last-child a,
      ul.pagination li:last-child span{
        font-weight:500 !important;
        color:#64748b !important;
        background:transparent !important;
        border:none !important;
        min-width:auto !important;
        padding:0.5rem 0.75rem !important;
        font-size:0.9rem !important;
      }
      
      /* Replace arrow symbols with simple text */
      .pagination li:first-child a,
      .pagination li:first-child span,
      .pagination .page-item:first-child .page-link,
      nav[role="navigation"] ul li:first-child a,
      nav[role="navigation"] ul li:first-child span,
      ul.pagination li:first-child a,
      ul.pagination li:first-child span{
        font-size:0 !important;
        line-height:0 !important;
      }
      
      .pagination li:first-child a::after,
      .pagination li:first-child span::after,
      .pagination .page-item:first-child .page-link::after,
      nav[role="navigation"] ul li:first-child a::after,
      nav[role="navigation"] ul li:first-child span::after,
      ul.pagination li:first-child a::after,
      ul.pagination li:first-child span::after{
        content:'< Prev' !important;
        font-size:0.9rem !important;
        line-height:normal !important;
        display:inline-block !important;
      }
      
      .pagination li:last-child a,
      .pagination li:last-child span,
      .pagination .page-item:last-child .page-link,
      nav[role="navigation"] ul li:last-child a,
      nav[role="navigation"] ul li:last-child span,
      ul.pagination li:last-child a,
      ul.pagination li:last-child span{
        font-size:0 !important;
        line-height:0 !important;
      }
      
      .pagination li:last-child a::after,
      .pagination li:last-child span::after,
      .pagination .page-item:last-child .page-link::after,
      nav[role="navigation"] ul li:last-child a::after,
      nav[role="navigation"] ul li:last-child span::after,
      ul.pagination li:last-child a::after,
      ul.pagination li:last-child span::after{
        content:'Next >' !important;
        font-size:0.9rem !important;
        line-height:normal !important;
        display:inline-block !important;
      }
      
      .pagination li:first-child a:hover,
      .pagination li:last-child a:hover,
      .pagination .page-item:first-child .page-link:hover:not(.disabled),
      .pagination .page-item:last-child .page-link:hover:not(.disabled),
      nav[role="navigation"] ul li:first-child a:hover,
      nav[role="navigation"] ul li:last-child a:hover,
      ul.pagination li:first-child a:hover,
      ul.pagination li:last-child a:hover{
        color:var(--green-600) !important;
        background:transparent !important;
      }
      
      /* Action buttons styling */
      .btn-group-sm .btn{ 
        white-space:nowrap; 
        padding:0.25rem 0.6rem; 
        font-size:0.875rem; 
        transition: all 0.2s ease;
        font-weight:600;
      }
      .btn-group-sm .btn:hover{ 
        transform: translateY(-1px); 
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      }
      .table td:last-child{ min-width:150px; }
      .table tbody tr{ transition: all 0.2s ease; }
      .table tbody tr:hover{ 
        background:#fffdf8 !important; 
        box-shadow: 0 2px 8px rgba(139,94,60,0.08);
      }
      .badge{ font-weight:600; padding:0.35rem 0.65rem; }
      
      @media (max-width: 992px){
        .pagination-wrapper{ 
          overflow-x:auto; 
          -webkit-overflow-scrolling:touch;
        }
        .pagination{ 
          gap:6px;
        }
        .pagination .page-link{ 
          padding:0.45rem 0.7rem !important; 
          font-size:0.9rem !important; 
          min-width:38px !important; 
          height:38px !important;
        }
      }
      
      @media (max-width: 768px){
        .admin-wrap{ flex-direction:column; }
        .admin-sidebar{ width:100%; border-radius:0; border-right:0; border-bottom:1px solid var(--border); }
        .admin-content{ border-left:0; }
        .btn-group-sm .btn{ padding:0.2rem 0.4rem; font-size:0.8rem; }
        .pagination{ 
          gap:5px;
        }
        .pagination .page-link{ 
          padding:0.4rem 0.6rem !important; 
          font-size:0.85rem !important; 
          min-width:36px !important; 
          height:36px !important;
        }
      }
    </style>
</head>
<body>
<div class="admin-wrap">
  <aside class="admin-sidebar">
    <div class="admin-brand">
      <div style="display:flex;flex-direction:column;line-height:1.1">
        <span class="logo-script" style="font-size:1.6rem; color:var(--brown-600);">LandCaffe</span>
      </div>
    </div>
    <div class="nav-caption">Admin Panel</div>
    <nav class="admin-nav">
      @auth
        @if(auth()->user()->role === 'admin')
          <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
            📊 Dashboard
          </a>
          <a href="{{ route('admin.menus.index') }}" class="@if(request()->routeIs('admin.menus.*')) active @endif">
            📋 Menu Management
          </a>
          <a href="{{ route('admin.categories.index') }}" class="@if(request()->routeIs('admin.categories.*')) active @endif">
            🗂️ Categories
          </a>
          <a href="{{ route('admin.users.index') }}" class="@if(request()->routeIs('admin.users.*')) active @endif">
            👥 User Management
          </a>
          <a href="{{ route('admin.logs.index') }}" class="@if(request()->routeIs('admin.logs.*')) active @endif">
            🧾 Activity Logs
          </a>
          
          <!-- Logout Button -->
          <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
            @csrf
            <button class="w-100 btn btn-primary" type="submit" style="text-align:center; padding:10px 12px; border-radius:10px;">
              Logout
            </button>
          </form>
        @elseif(auth()->user()->role === 'kasir')
          <a href="{{ route('kasir.orders.index') }}" class="@if(request()->routeIs('kasir.orders.index')) active @endif">🧾 Daftar Pesanan</a>
          <a href="{{ route('kasir.orders.create') }}" class="@if(request()->routeIs('kasir.orders.create')) active @endif">➕ Buat Pesanan</a>
          
          <!-- Logout Button -->
          <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
            @csrf
            <button class="w-100 btn btn-primary" type="submit" style="text-align:center; padding:10px 12px; border-radius:10px;">
              Logout
            </button>
          </form>
        @elseif(auth()->user()->role === 'chef')
          <a href="{{ route('chef.orders.index') }}" class="active">👨‍🍳 Orders (Chef)</a>
          
          <!-- Logout Button -->
          <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
            @csrf
            <button class="w-100 btn btn-primary" type="submit" style="text-align:center; padding:10px 12px; border-radius:10px;">
              Logout
            </button>
          </form>
        @elseif(auth()->user()->role === 'manager')
          <a href="{{ route('manager.reports.index') }}" class="active">📈 Reports</a>
          
          <!-- Logout Button -->
          <form method="POST" action="{{ route('logout') }}" style="margin-top:10px;">
            @csrf
            <button class="w-100 btn btn-primary" type="submit" style="text-align:center; padding:10px 12px; border-radius:10px;">
              Logout
            </button>
          </form>
        @endif
      @endauth
    </nav>
  </aside>
  {{-- Sidebar user box removed (agar Logout tidak dobel) --}}

  <section class="admin-content">
    <!-- Top header bar -->
    <div class="admin-card mb-3 p-3 d-flex flex-wrap align-items-center gap-2 justify-content-between" style="background:#fff;">
      <div class="d-flex align-items-center gap-3">
        <h1 class="m-0 page-title">@yield('page_title', 'Dashboard')</h1>
      </div>
      <div class="d-flex align-items-center gap-2 flex-wrap">
        @yield('page_actions')
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success admin-card p-3">{{ session('success') }}</div>
    @endif
    @yield('content')
  </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
