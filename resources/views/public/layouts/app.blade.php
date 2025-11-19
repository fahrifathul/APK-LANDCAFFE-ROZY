<!DOCTYPE html>
<html lang="id">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'LandCaffe')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Script-like logo font + elegant serif for headings/lead -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <style>
    /* Modern Navigation Styles */
    .navbar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
      padding: 0.5rem 0;
      transition: all 0.3s ease;
      border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }
    
    #mainNavbar.scrolled {
      padding: 0.5rem 0;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .navbar-brand {
      font-weight: 700;
      color: #2d1810 !important;
      transition: all 0.3s ease;
      padding: 0.5rem 0;
      margin: 0;
      display: flex;
      align-items: center;
    }
    
    .nav-link {
      font-weight: 500;
      color: #2d1810 !important;
      position: relative;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      margin: 0;
      outline: none !important;
      box-shadow: none !important;
      letter-spacing: 0.3px;
      white-space: nowrap;
    }
    
    /* Remove default focus styles */
    .nav-link:focus,
    .nav-link:focus-visible,
    .nav-link:active {
      outline: none !important;
      box-shadow: none !important;
    }
    
    /* Custom focus-visible style */
    .nav-link:focus-visible {
      background-color: rgba(139, 94, 60, 0.05);
    }
    
    .nav-link-underline {
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 3px;
      background: #4caf50;
      transform: translateX(-50%);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border-radius: 3px;
      opacity: 0;
    }
    
    .nav-link:hover .nav-link-underline {
      width: 60%;
      opacity: 1;
    }
    
    .nav-link.active .nav-link-underline {
      width: 80%;
      opacity: 1;
    }
    
    .nav-link:hover {
      color: #388e3c !important;
      background-color: rgba(76, 175, 80, 0.1);
    }
    
    .nav-link.active {
      color: #2e7d32 !important;
      font-weight: 600;
    }
    
    .dropdown-menu {
      border: none;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      padding: 0.5rem;
      margin-top: 0.5rem;
    }
    
    .dropdown-item {
      border-radius: 8px;
      padding: 0.5rem 1rem;
      transition: all 0.2s ease;
    }
    
    .dropdown-item:hover {
      background: #f8f9fa;
      color: #8b5e3c !important;
    }
    
    .avatar-sm {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: linear-gradient(135deg, #8b5e3c, #6b4423);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 0.9rem;
    }
    
    .navbar-toggler {
      border: none;
      padding: 0.5rem;
      box-shadow: none !important;
    }
    
    .navbar-toggler:focus {
      box-shadow: none !important;
    }
    
    @media (max-width: 991.98px) {
      .navbar-collapse {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        margin: 1rem -0.5rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        max-height: 80vh;
        overflow-y: auto;
      }
      
      .nav-link {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        margin: 0.25rem 0;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
        outline: none !important;
        box-shadow: none !important;
        white-space: nowrap;
      }
      
      .nav-link:focus,
      .nav-link:focus-visible,
      .nav-link:active {
        outline: none !important;
        box-shadow: none !important;
      }
      
      .nav-link i {
        width: 24px;
        text-align: center;
        margin-right: 0.75rem;
        font-size: 1.1em;
      }
      
      .nav-link:hover {
        background: rgba(139, 94, 60, 0.05);
        transform: translateX(4px);
      }
      
      .nav-link.active {
        background: rgba(139, 94, 60, 0.08);
        color: #8b5e3c !important;
        font-weight: 600;
      }
      
      .nav-link-underline {
        display: none;
      }
    }
    
    :root{
      /* Light Green Theme */
      --bg:#f0f7f0; /* light green background */
      --bg-light:#f5faf5; /* lighter green */
      --bg-lighter:#fbfefb; /* lightest green */
      --text:#1a2e1a; /* dark green */
      --text-light:#3a5c3a; /* lighter green */
      --muted:#7d9e7d; /* muted green */
      --border:#c0d8c0; /* light green border */
      --primary:#4caf50; /* green */
      --primary-light:#6fbf73; /* light green */
      --primary-dark:#388e3c; /* dark green */
      --accent:#8bc34a; /* light green accent */
      --accent-light:#aed581; /* light accent */
      --accent-dark:#689f38; /* dark accent */
      --success:#4caf50; /* green */
      --danger:#f44336; /* red */
      --warning:#ff9800; /* amber */
      --info:#2196f3; /* blue */
      --white:#ffffff;
      --black:#000000;
      --shadow:0 4px 12px rgba(0,0,0,0.08);
      --shadow-sm:0 2px 8px rgba(0,0,0,0.05);
      --shadow-md:0 6px 16px rgba(0,0,0,0.1);
      --shadow-lg:0 10px 24px rgba(0,0,0,0.12);
      --shadow-xl:0 20px 40px rgba(0,0,0,0.15);
      --radius-sm:4px;
      --radius:8px;
      --radius-lg:12px;
      --radius-xl:16px;
      --radius-2xl:24px;
      --radius-full:9999px;
      --transition:all 0.3s ease;
      --transition-slow:all 0.5s ease;
      --transition-fast:all 0.15s ease;
      --container-max:1400px;
    }
    * {
      box-sizing: border-box;
    }
    html, body {
      overflow-x: hidden;
      max-width: 100vw;
    }
    body{ background:var(--bg); color:var(--text); }
    .container-xxl {
      max-width: 1400px;
      padding-left: 1rem;
      padding-right: 1rem;
    }
    .navbar{ background:#ffffff !important; border-bottom:1px solid #e7d5c7 !important; }
    .navbar .navbar-brand{ color:var(--green) !important; }
    .navbar .nav-link{ color:#111827; }
    .navbar .nav-link.active{ color:var(--green) !important; font-weight:600; border-bottom:2px solid var(--green); }
    .btn-green{ background:linear-gradient(135deg, var(--green), var(--green-700)); color:#fff; border:1px solid var(--green); }
    .btn-green:hover{ background:linear-gradient(135deg, var(--green-700), var(--green)); color:#fff; border-color:var(--green-700); }
    .btn-outline-muted{ border:1px solid #e5e7eb; color:#111827; background:#fff; }
    .btn-outline-muted:hover{ background:#f3f4f6; }
    .hero { background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 55%, #ffffff 100%); min-height: 340px; color: #fff; border-radius: 16px; position: relative; overflow: hidden; box-shadow: 0 8px 24px rgba(0,0,0,.08); }
    .hero-overlay { position:absolute; inset:0; background: radial-gradient(1200px 300px at -10% 120%, rgba(255,255,255,.30), rgba(255,255,255,0)); }
    .hero-content { position: relative; z-index: 2; color:#fff; }
    .hero-content-inner{ max-width: 880px; margin-inline: auto; }
    .welcome-title{ display:block; color:#ffffff; text-shadow: 0 2px 10px rgba(0,0,0,.25); font-weight:800; }
    .welcome-subtitle{ display:block; color:rgba(255,255,255,.95); font-size:1.05rem; line-height:1.7; }
    .welcome-actions { display:none; }
    .brand-pill { background:var(--green-50); color:var(--green); display:inline-flex; align-items:center; gap:.5rem; padding:.35rem .75rem; border-radius:999px; font-weight:600; border:1px solid #e7d5c7; }
    .category-chip{ 
      border: 1px solid #e5e7eb; 
      border-radius: 999px; 
      padding: 0.4rem 1rem; 
      display: inline-block; 
      margin: 0.25rem; 
      font-size: 0.92rem; 
      background: #f8f9fa; 
      color: #374151; 
      text-decoration: none; 
      font-weight: 500;
      transition: all 0.2s ease;
    }
    .category-chip:hover {
      background: #f1f5f9;
      transform: translateY(-1px);
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .category-chip.active{ 
      background: linear-gradient(135deg, #2E7D32, #1B5E20); 
      color: #fff; 
      border-color: transparent; 
      box-shadow: 0 4px 12px rgba(46, 125, 50, 0.3);
      font-weight: 600;
    }
    /* Pretty hero search */
    .hero-search { max-width:720px; margin-inline:auto; position:relative; }
    .hero-search .form-control{ height:52px; border-radius:999px; padding-left:48px; border:1px solid #e7d5c7; box-shadow:0 6px 18px rgba(139,94,60,.15); }
    .hero-search .btn{ height:52px; border-radius:999px; padding-inline:22px; font-weight:600; box-shadow:0 6px 18px rgba(11,11,11,.18); }
    .hero-search .search-icon{ position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#9ca3af; }
    /* Standardized menu card styles */
    .menu-card{ overflow:hidden; background:var(--card) !important; border:1px solid #d4c4b0 !important; }
    .menu-img{ height:200px; object-fit:cover; width:100%; }
    .menu-price { color:var(--green); font-weight:700; }
    .menu-card-body .small.text-muted{ color:var(--muted) !important; }
    .menu-card .card-title{ font-family: 'Playfair Display', serif; font-weight:600; letter-spacing:.2px; color:var(--text); }
    .footer { background:#0f172a; color:#cbd5e1; padding:30px 0; margin-top:56px; }
    .footer a{ color:#e2e8f0; text-decoration:none; }
    .footer p{ color:#ffffff; }
    .logo-script{ font-family: 'Great Vibes', cursive; letter-spacing: .5px; font-size: 1.6rem; }
    .btn-login{ font-family: inherit; letter-spacing:.3px; font-weight:600; border-radius:999px; transition: all .2s ease; box-shadow:0 8px 18px rgba(139,94,60,.25); }
    /* Elegant typography helpers */
    .elegant-title{ font-family: 'Playfair Display', serif; letter-spacing:.3px; }
    .elegant-lead{ font-family: 'Playfair Display', serif; font-weight:500; font-size:1.08rem; line-height:1.8; max-width:62ch; }
    @media (min-width: 768px){
      .elegant-lead{ font-size:1.2rem; }
      .welcome-subtitle{ font-size:1.15rem; }
    }
    /* History section */
    .history-section{ background:#fff; border-radius:16px; box-shadow: 0 8px 24px rgba(0,0,0,.06); border:1px solid #bfdbfe; }
    .history-section h3{ color: var(--green-700); font-weight: 700; }
    .social a{ width:36px; height:36px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; border:1px solid #f5d0ea; color:#ec4899; background:#fff; margin-right:8px; text-decoration:none; }
    .social a:hover{ background:#fdf2f8; }
    /* Favorite menu cards */
    .fav-card{ border:1px solid #f1f5f9; border-radius:14px; box-shadow:0 4px 14px rgba(2,6,23,.06); overflow:hidden; background:#fff; }
    .fav-card .info{ padding:14px; }
    .fav-card .thumb{ width:140px; height:100%; object-fit:cover; }
    .fav-price{ font-weight:800; color:var(--green); }
    .fav-plus{ position:absolute; right:10px; bottom:10px; width:34px; height:34px; border-radius:50%; display:flex; align-items:center; justify-content:center; background:#fff; border:1px solid #e5e7eb; box-shadow:0 4px 12px rgba(0,0,0,.12); }
    .fav-plus:hover{ background:#f8fafc; }
    .fav-stock{ position:absolute; right:10px; bottom:10px; background:linear-gradient(135deg, var(--green), var(--green-700)); color:#fff; padding:6px 10px; border-radius:999px; font-weight:600; font-size:.85rem; box-shadow:0 4px 12px rgba(0,0,0,.12); }
    .fav-card h5{ font-family: 'Playfair Display', serif; font-weight:600; letter-spacing:.2px; }
    /* About page cards */
    .about-card{ background:#fff; border:1px solid #e7d5c7; border-radius:16px; box-shadow:0 12px 28px rgba(0,0,0,.06); padding:22px; }
    .info-list{ list-style:none; padding:0; margin:0; }
    .info-list li{ display:flex; align-items:flex-start; gap:10px; padding:10px 0; border-bottom:1px dashed #e7d5c7; }
    .info-list li:last-child{ border-bottom:0; }
    .icon-circle{ width:30px; height:30px; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg, var(--green), var(--green-700)); color:#fff; box-shadow:0 6px 14px rgba(0,0,0,.12); }
    /* Best sellers */
    .best-title{ color:#8b5e3c; font-weight:800; }
    .best-wrap{ display:flex; gap:14px; overflow-x:auto; padding-bottom:6px; }
    .best-item{ min-width:220px; background:#fff; border:1px solid #e7d5c7; border-radius:16px; box-shadow:0 10px 24px rgba(0,0,0,.06); overflow:hidden; }
    .best-item img{ width:100%; height:120px; object-fit:cover; }
    .best-item .body{ padding:12px; }
    /* Rekomendasi grid */
    .reco-title{ font-weight:800; font-size:28px; text-align:center; color:#0f172a; }
    .reco-subtitle{ text-align:center; color:#64748b; max-width:70ch; margin:0 auto 16px; }
    .reco-card{ border:1px solid #e7d5c7; border-radius:16px; overflow:hidden; box-shadow:0 12px 28px rgba(0,0,0,.06); background:#fff; }
    .reco-card img{ width:100%; height:160px; object-fit:cover; }
    .reco-card .body{ padding:12px; }
    .reco-badge{ display:inline-flex; align-items:center; gap:6px; background:#fff; border:1px solid #e5e7eb; border-radius:999px; padding:4px 8px; font-weight:600; box-shadow:0 4px 12px rgba(0,0,0,.06); }
    
    /* New Home Page Styles */
    .hero-welcome{ 
      height: 280px; 
      background: linear-gradient(135deg, #8b5e3c 0%, #0b0b0b 55%, #ffffff 100%); min-height: 340px; color: #fff; border-radius: 16px; position: relative; overflow: hidden;
    }
    .hero-welcome-overlay{ position:absolute; inset:0; background: linear-gradient(to right, rgba(0,0,0,0.4), rgba(0,0,0,0.1)); }
    .hero-welcome-title{ 
      position: relative; 
      z-index: 2; 
      color: #fff; 
      font-size: 3rem; 
      font-weight: 700; 
      text-shadow: 0 2px 10px rgba(0,0,0,.5); 
      margin: 0;
    }
    
    .section-title{ 
      font-size: 1.75rem; 
      font-weight: 700; 
      color: var(--text); 
      margin-bottom: 1.5rem;
    }
    
    /* Featured Cards */
    .featured-card{ 
      background: var(--card); 
      border-radius: 16px; 
      overflow: hidden; 
      box-shadow: 0 4px 12px rgba(139,94,60,.15); 
      transition: transform .2s ease, box-shadow .2s ease;
      border: 1px solid #d4c4b0;
    }
    .featured-card:hover{ 
      transform: translateY(-4px); 
      box-shadow: 0 8px 20px rgba(139,94,60,.25); 
    }
    .featured-img{ 
      width: 100%; 
      height: 200px; 
      object-fit: cover; 
      background: linear-gradient(135deg, #d4c4b0, #e8d5c4);
    }
    .featured-body{ 
      padding: 1.25rem; 
    }
    .featured-title{ 
      font-size: 1.25rem; 
      font-weight: 700; 
      color: var(--text); 
      margin-bottom: 0.5rem;
    }
    .featured-desc{ 
      color: var(--muted); 
      font-size: 0.95rem; 
      margin: 0;
    }
    
    /* Menu Tabs */
    .menu-tabs{ 
      border-bottom: 2px solid #e7d5c7; 
    }
    .menu-tabs .nav-link{ 
      color: #64748b; 
      font-weight: 600; 
      border: none; 
      border-bottom: 3px solid transparent; 
      padding: 0.75rem 1.25rem; 
      transition: all .2s ease;
    }
    .menu-tabs .nav-link:hover{ 
      color: var(--green); 
      border-bottom-color: var(--green-50);
    }
    .menu-tabs .nav-link.active{ 
      color: var(--green); 
      border-bottom-color: var(--green); 
      background: transparent;
    }
    
    /* Menu Item Cards */
    .menu-item-card{ 
      background: var(--card); 
      border-radius: 12px; 
      overflow: hidden; 
      box-shadow: 0 2px 8px rgba(139,94,60,.1); 
      transition: transform .2s ease, box-shadow .2s ease; 
      cursor: pointer;
      border: 1px solid #d4c4b0;
    }
    .menu-item-card:hover{ 
      transform: translateY(-2px); 
      box-shadow: 0 4px 12px rgba(139,94,60,.2); 
    }
    .menu-item-img{ 
      width: 100%; 
      height: 140px; 
      object-fit: cover; 
      background: linear-gradient(135deg, #d4c4b0, #e8d5c4);
    }
    .menu-item-body{ 
      padding: 0.75rem; 
      text-align: center;
    }
    .menu-item-name{ 
      font-size: 0.95rem; 
      font-weight: 600; 
      color: var(--text); 
      margin: 0;
    }
    
    /* About Home Section */
    .about-home-section{ 
      background: var(--card); 
      border-radius: 16px; 
      padding: 2rem; 
      box-shadow: 0 4px 12px rgba(139,94,60,.12);
      border: 1px solid #d4c4b0;
    }
    .about-home-text{ 
      color: var(--muted); 
      font-size: 1rem; 
      line-height: 1.7; 
      margin: 0;
    }
    
    /* Search Bar Styling */
    .search-container {
      position: relative;
      width: 100%;
    }
    .search-input {
      width: 100%;
      padding: 1rem 1.5rem;
      font-size: 1.1rem;
      border: 2px solid rgba(255,255,255,0.3);
      border-radius: 50px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
      color: var(--text);
    }
    .search-input:focus {
      outline: none;
      border-color: rgba(255,255,255,0.8);
      background: rgba(255,255,255,1);
      box-shadow: 0 12px 32px rgba(0,0,0,0.3);
      transform: translateY(-2px);
    }
    .search-input::placeholder {
      color: #8b7355;
    }
    
    @media (max-width: 768px){
      .hero-welcome-title{ font-size: 2rem; }
      .menu-item-img{ height: 120px; }
      .search-input { 
        font-size: 1rem; 
        padding: 0.875rem 1.25rem; 
      }
    }
    
    /* Pagination Styles for Public Pages */
    .pagination-wrapper{ width:100%; overflow-x:auto; }
    .pagination{ margin:0; flex-wrap:wrap; justify-content:center; gap:4px; }
    .pagination .page-item{ margin:0; }
    .pagination .page-link{ 
      border-radius:8px; 
      border:1px solid #e7d5c7; 
      color:var(--green); 
      padding:0.5rem 0.75rem; 
      min-width:40px; 
      text-align:center;
    }
    .pagination .page-link:hover{ background:var(--green-50); border-color:var(--green); }
    .pagination .page-item.active .page-link{ 
      background:linear-gradient(135deg, var(--green), var(--green-700)); 
      border-color:var(--green); 
      color:#fff; 
    }
    .pagination .page-item.disabled .page-link{ opacity:0.5; cursor:not-allowed; }
    
    @media (max-width: 576px){
      .pagination .page-link{ padding:0.4rem 0.6rem; font-size:0.9rem; min-width:36px; }
    }

    /* ===== MODERN WELCOME PAGE STYLES ===== */
    
    /* Hero Section Modern */
    .hero-welcome-modern {
      min-height: 85vh;
      background: linear-gradient(135deg, #4caf50 0%, #2e7d32 50%, #1b5e20 100%);
      border-radius: 20px;
      position: relative;
      overflow: hidden;
      margin-bottom: 3rem;
      display: flex;
      align-items: center;
      padding: 3rem 1rem;
    }
    
    .hero-particles {
      position: absolute;
      inset: 0;
      background-image: 
        radial-gradient(circle at 20% 30%, rgba(255,255,255,0.05) 1px, transparent 1px),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.05) 1px, transparent 1px),
        radial-gradient(circle at 40% 80%, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 50px 50px, 80px 80px, 100px 100px;
      animation: particleFloat 20s linear infinite;
    }
    
    @keyframes particleFloat {
      0% { transform: translateY(0); }
      100% { transform: translateY(-50px); }
    }
    
    .hero-welcome-overlay-modern {
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at top right, rgba(76, 175, 80, 0.3), transparent 50%),
                  radial-gradient(ellipse at bottom left, rgba(255,255,255,0.05), transparent 50%);
    }
    
    .hero-content-wrapper {
      position: relative;
      z-index: 2;
      padding: 0;
    }
    
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.2);
      padding: 0.5rem 1rem;
      border-radius: 50px;
      color: #fff;
      font-size: 0.9rem;
      font-weight: 600;
    }
    
    .hero-badge-icon {
      color: #8bc34a;
    }
    
    .hero-welcome-title-modern {
      font-size: clamp(2rem, 5vw, 3.5rem);
      font-weight: 800;
      color: #fff;
      line-height: 1.2;
      margin-bottom: 1.5rem;
      font-family: 'Playfair Display', serif;
    }
    
    .hero-highlight {
      display: block;
      background: linear-gradient(135deg, #8bc34a, #689f38);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .hero-subtitle-modern {
      font-size: clamp(1rem, 2vw, 1.25rem);
      color: rgba(255,255,255,0.9);
      line-height: 1.7;
      max-width: 600px;
    }
    
    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }
    
    .btn-hero-primary {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: linear-gradient(135deg, #8bc34a, #689f38);
      color: #1a0f08;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 10px 30px rgba(251,191,36,0.3);
    }
    
    .btn-hero-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 40px rgba(251,191,36,0.4);
      color: #1a0f08;
    }
    
    .btn-hero-secondary {
      display: inline-flex;
      align-items: center;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      color: #fff;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.3s ease;
    }
    
    .btn-hero-secondary:hover {
      background: rgba(255,255,255,0.2);
      color: #fff;
      border-color: rgba(255,255,255,0.3);
    }
    
    /* Hero Stats */
    .hero-stats {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      margin-top: 2rem;
    }
    
    .stat-item {
      text-align: center;
    }
    
    .stat-number {
      font-size: 2rem;
      font-weight: 800;
      color: #fbbf24;
      font-family: 'Playfair Display', serif;
    }
    
    .stat-label {
      font-size: 0.9rem;
      color: rgba(255,255,255,0.7);
      margin-top: 0.25rem;
    }
    
    .stat-divider {
      width: 1px;
      background: rgba(255,255,255,0.2);
    }
    
    /* Hero Image */
    .hero-image-wrapper {
      position: relative;
      z-index: 2;
      padding: 1rem;
    }
    
    .hero-image-card {
      position: relative;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }
    
    .hero-main-image {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 24px;
    }
    
    .hero-floating-card {
      position: absolute;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(10px);
      padding: 1rem 1.5rem;
      border-radius: 16px;
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      animation: floatCard 3s ease-in-out infinite;
      max-width: 200px;
    }
    
    .hero-card-1 {
      top: 5%;
      right: 0;
      animation-delay: 0s;
    }
    
    .hero-card-2 {
      bottom: 10%;
      left: 0;
      animation-delay: 1.5s;
    }
    
    @keyframes floatCard {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    
    .floating-card-icon {
      font-size: 2rem;
    }
    
    .floating-card-title {
      font-weight: 700;
      color: var(--text);
      font-size: 0.95rem;
    }
    
    .floating-card-subtitle {
      font-size: 0.85rem;
      color: var(--muted);
    }
    
    /* Scroll Indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
    }
    
    .scroll-mouse {
      width: 30px;
      height: 50px;
      border: 2px solid rgba(255,255,255,0.5);
      border-radius: 20px;
      position: relative;
    }
    
    .scroll-wheel {
      width: 4px;
      height: 10px;
      background: rgba(255,255,255,0.8);
      border-radius: 2px;
      position: absolute;
      top: 8px;
      left: 50%;
      transform: translateX(-50%);
      animation: scrollWheel 2s ease-in-out infinite;
    }
    
    @keyframes scrollWheel {
      0%, 100% { opacity: 1; top: 8px; }
      50% { opacity: 0.5; top: 20px; }
    }
    
    /* Search Section Modern */
    .search-section-modern {
      position: relative;
      max-width: 700px;
      margin: 0 auto;
      padding: 0 1rem;
    }
    
    .search-icon-wrapper {
      position: absolute;
      left: 1.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      z-index: 2;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      pointer-events: none;
      line-height: 0;
    }
    
    .search-icon-wrapper svg {
      width: 18px;
      height: 18px;
      display: block;
      vertical-align: middle;
    }
    
    .search-input-modern {
      width: 100%;
      padding-left: 3.5rem;
      padding-right: 4rem;
      padding-top: 0;
      padding-bottom: 0;
      font-size: 1rem;
      border: 2px solid #e7d5c7;
      border-radius: 50px;
      background: #fff;
      transition: all 0.3s ease;
      box-shadow: 0 4px 20px rgba(139,94,60,0.1);
      line-height: 52px;
      height: 52px;
    }
    
    .search-input-modern::placeholder {
      line-height: normal;
    }
    
    .search-input-modern:focus {
      outline: none;
      border-color: var(--green);
      box-shadow: 0 8px 30px rgba(139,94,60,0.2);
      transform: translateY(-2px);
    }
    
    .search-suggestions {
      display: flex;
      gap: 0.5rem;
      margin-top: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }
    
    .search-tag {
      padding: 0.4rem 1rem;
      background: rgba(139,94,60,0.08);
      border: 1px solid rgba(139,94,60,0.15);
      border-radius: 50px;
      font-size: 0.875rem;
      color: var(--green);
      cursor: pointer;
      transition: all 0.2s ease;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      white-space: nowrap;
    }
    
    .search-tag:hover {
      background: var(--green);
      color: #fff;
      border-color: var(--green);
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(139,94,60,0.2);
    }
    
    .search-clear-btn {
      position: absolute;
      right: 1.75rem;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      color: var(--muted);
      cursor: pointer;
      padding: 0;
      border-radius: 50%;
      transition: all 0.2s ease;
      z-index: 2;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 24px;
      height: 24px;
      line-height: 0;
    }
    
    .search-clear-btn svg {
      width: 16px;
      height: 16px;
      display: block;
      vertical-align: middle;
    }
    
    .search-clear-btn:hover {
      background: rgba(139,94,60,0.1);
      color: var(--green);
    }
    
    .search-results-count {
      text-align: center;
      margin-top: 1rem;
      padding: 0.75rem 1.5rem;
      background: linear-gradient(135deg, rgba(139,94,60,0.1), rgba(139,94,60,0.05));
      border-radius: 50px;
      color: var(--green);
      font-weight: 600;
      font-size: 0.95rem;
      border: 1px solid rgba(139,94,60,0.2);
      display: inline-block;
      margin-left: auto;
      margin-right: auto;
      width: fit-content;
    }
    
    /* Section Headers */
    .section-header {
      margin-bottom: 2.5rem;
      padding: 0 1rem;
    }
    
    .section-badge {
      display: inline-block;
      background: linear-gradient(135deg, rgba(139,94,60,0.1), rgba(139,94,60,0.05));
      color: var(--green);
      padding: 0.5rem 1.25rem;
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 700;
      border: 1px solid rgba(139,94,60,0.2);
      margin-bottom: 1rem;
    }
    
    .section-title-modern {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 800;
      color: var(--text);
      font-family: 'Playfair Display', serif;
      margin-bottom: 1rem;
    }
    
    .section-subtitle {
      font-size: 1.1rem;
      color: var(--muted);
      max-width: 600px;
      margin: 0 auto;
    }
    
    /* Featured Cards Modern */
    .featured-card-modern {
      background: var(--card);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(139,94,60,0.12);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(139,94,60,0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    .featured-card-modern:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(139,94,60,0.25);
    }
    
    .featured-image-wrapper {
      position: relative;
      overflow: hidden;
    }
    
    .featured-img-modern {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    
    .featured-card-modern:hover .featured-img-modern {
      transform: scale(1.1);
    }
    
    .featured-img-placeholder {
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #e8d5c4, #d4c4b0);
      color: var(--green);
      font-size: 4rem;
    }
    
    .featured-badge {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: linear-gradient(135deg, #fbbf24, #f59e0b);
      color: #1a0f08;
      padding: 0.4rem 1rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 700;
      box-shadow: 0 4px 15px rgba(251,191,36,0.4);
    }
    
    .featured-body-modern {
      padding: 1.5rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    
    .featured-title-modern {
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 0.75rem;
      font-family: 'Playfair Display', serif;
    }
    
    .featured-desc-modern {
      color: var(--muted);
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 1rem;
      flex: 1;
    }
    
    .featured-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 1rem;
      border-top: 1px solid rgba(139,94,60,0.1);
    }
    
    .featured-rating {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #fbbf24;
      font-weight: 700;
    }
    
    .btn-featured-action {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--green);
      color: #fff;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .btn-featured-action:hover {
      background: var(--green-700);
      transform: translateX(4px);
    }
    
    /* Category Tabs Modern */
    .category-tabs-wrapper {
      position: relative;
      padding: 0 1rem;
      margin-bottom: 2rem;
    }
    
    .category-tabs-scroll {
      overflow-x: auto;
      overflow-y: hidden;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
    }
    
    .category-tabs-scroll::-webkit-scrollbar {
      display: none;
    }
    
    .category-tabs-modern {
      display: flex;
      gap: 1rem;
      border: none;
      padding-bottom: 0.5rem;
    }
    
    .category-tab-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 1.5rem;
      background: #fff;
      border: 2px solid #e7d5c7;
      border-radius: 50px;
      color: var(--text);
      font-weight: 600;
      white-space: nowrap;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .category-tab-btn:hover {
      border-color: var(--green);
      background: rgba(139,94,60,0.05);
    }
    
    .category-tab-btn.active {
      background: linear-gradient(135deg, var(--green), var(--green-700));
      color: #fff;
      border-color: transparent;
      box-shadow: 0 4px 15px rgba(139,94,60,0.3);
    }
    
    .tab-icon {
      font-size: 1.2rem;
    }
    
    /* Menu Item Cards Modern */
    .menu-item-card-modern {
      background: var(--card);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(139,94,60,0.1);
      transition: all 0.3s ease;
      border: 1px solid rgba(139,94,60,0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    .menu-item-card-modern:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(139,94,60,0.2);
    }
    
    .menu-item-image-wrapper {
      position: relative;
      overflow: hidden;
    }
    
    .menu-item-img-modern {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    .menu-item-card-modern:hover .menu-item-img-modern {
      transform: scale(1.05);
    }
    
    .menu-item-placeholder {
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      color: rgba(139,94,60,0.5);
    }
    
    .menu-item-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .menu-item-card-modern:hover .menu-item-overlay {
      opacity: 1;
    }
    
    .btn-menu-view {
      background: #fff;
      color: var(--text);
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      border: none;
      font-weight: 600;
      cursor: pointer;
      transform: translateY(10px);
      transition: transform 0.3s ease;
    }
    
    .menu-item-card-modern:hover .btn-menu-view {
      transform: translateY(0);
    }
    
    .menu-item-body-modern {
      padding: 1rem;
      text-align: center;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    
    .menu-item-name-modern {
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 0.5rem;
    }
    
    .menu-item-price {
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--green);
      font-family: 'Playfair Display', serif;
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
    }
    
    .empty-state-icon {
      font-size: 4rem;
      margin-bottom: 1rem;
    }
    
    .empty-state-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 0.5rem;
    }
    
    .empty-state-text {
      color: var(--muted);
      font-size: 1rem;
    }
    
    /* About Section Modern */
    .about-home-section-modern {
      background: var(--card);
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 10px 40px rgba(139,94,60,0.12);
      border: 1px solid rgba(139,94,60,0.1);
    }
    
    .about-image-grid {
      position: relative;
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 1rem;
      padding: 0.5rem;
    }
    
    .about-img-main {
      grid-column: 1 / 2;
      grid-row: 1 / 3;
    }
    
    .about-img-small {
      grid-column: 2 / 3;
      grid-row: 1 / 2;
    }
    
    .about-badge-float {
      grid-column: 2 / 3;
      grid-row: 2 / 3;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .about-badge-content {
      background: linear-gradient(135deg, var(--green), var(--green-700));
      color: #fff;
      padding: 1.5rem;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(139,94,60,0.3);
    }
    
    .about-badge-number {
      font-size: 2.5rem;
      font-weight: 800;
      font-family: 'Playfair Display', serif;
    }
    
    .about-badge-text {
      font-size: 0.9rem;
      margin-top: 0.5rem;
    }
    
    .about-text-modern {
      font-size: 1.05rem;
      line-height: 1.8;
      color: var(--muted);
    }
    
    .about-features {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }
    
    .about-feature-item {
      display: flex;
      gap: 1rem;
      align-items: flex-start;
    }
    
    .about-feature-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--green), var(--green-700));
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      flex-shrink: 0;
    }
    
    .about-feature-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 0.25rem;
    }
    
    .about-feature-desc {
      font-size: 0.95rem;
      color: var(--muted);
      margin: 0;
    }
    
    .btn-about-more {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: linear-gradient(135deg, var(--green), var(--green-700));
      color: #fff;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(139,94,60,0.3);
    }
    
    .btn-about-more:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(139,94,60,0.4);
      color: #fff;
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes fadeInUp {
      from { 
        opacity: 0; 
        transform: translateY(30px); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0); 
      }
    }
    
    @keyframes slideUp {
      from { 
        opacity: 0; 
        transform: translateY(50px); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0); 
      }
    }
    
    .animate-fade-in {
      animation: fadeIn 1s ease-out;
    }
    
    .animate-slide-up {
      animation: slideUp 1s ease-out 0.2s both;
    }
    
    .animate-slide-up-delay {
      animation: slideUp 1s ease-out 0.4s both;
    }
    
    .animate-fade-in-delay {
      animation: fadeIn 1s ease-out 0.6s both;
    }
    
    .animate-fade-in-delay-2 {
      animation: fadeIn 1s ease-out 0.8s both;
    }
    
    .animate-float {
      animation: floatCard 6s ease-in-out infinite;
    }
    
    .animate-in {
      animation: fadeInUp 0.6s ease-out;
    }
    
    /* Responsive Design */
    @media (max-width: 991px) {
      .hero-welcome-modern {
        min-height: 70vh;
        border-radius: 16px;
        padding: 2rem 1rem;
      }
      
      .hero-welcome-title-modern {
        font-size: 2rem;
      }
      
      .hero-stats {
        gap: 1.5rem;
        margin-top: 1.5rem;
      }
      
      .stat-number {
        font-size: 1.5rem;
      }
      
      .container-xxl {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
      }
      
      .about-image-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
      }
      
      .about-img-main {
        grid-column: 1;
        grid-row: 1;
      }
      
      .about-img-small {
        grid-column: 1;
        grid-row: 2;
      }
      
      .about-badge-float {
        grid-column: 1;
        grid-row: 3;
      }
      
      .about-home-section-modern {
        padding: 2rem;
      }
    }
    
    @media (max-width: 768px) {
      .hero-welcome-modern {
        min-height: 65vh;
        border-radius: 12px;
        margin-bottom: 2rem;
        padding: 2rem 0.75rem;
      }
      
      .hero-welcome-title-modern {
        font-size: 1.75rem;
      }
      
      .hero-subtitle-modern {
        font-size: 0.95rem;
      }
      
      .hero-actions {
        flex-direction: column;
        width: 100%;
        gap: 0.75rem;
      }
      
      .btn-hero-primary,
      .btn-hero-secondary {
        width: 100%;
        justify-content: center;
        padding: 0.875rem 1.5rem;
      }
      
      .hero-stats {
        justify-content: space-between;
        width: 100%;
        gap: 1rem;
        margin-top: 1.5rem;
      }
      
      .stat-divider {
        display: none;
      }
      
      .hero-floating-card {
        display: none;
      }
      
      .container-xxl {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
      }
      
      .search-input-modern {
        padding-left: 3rem;
        padding-right: 3.5rem;
        padding-top: 0;
        padding-bottom: 0;
        font-size: 0.95rem;
        height: 48px;
        line-height: 48px;
      }
      
      .search-icon-wrapper {
        left: 1.5rem;
      }
      
      .search-icon-wrapper svg {
        width: 16px;
        height: 16px;
      }
      
      .search-section-modern {
        padding: 0 0.5rem;
      }
      
      .search-clear-btn {
        right: 1.5rem;
        width: 20px;
        height: 20px;
      }
      
      .search-clear-btn svg {
        width: 14px;
        height: 14px;
      }
      
      .search-results-count {
        font-size: 0.875rem;
        padding: 0.6rem 1.25rem;
      }
      
      .section-header {
        padding: 0 0.5rem;
        margin-bottom: 2rem;
      }
      
      .category-tabs-wrapper {
        padding: 0 0.5rem;
      }
      
      .section-title-modern {
        font-size: 2rem;
      }
      
      .featured-img-modern {
        height: 200px;
      }
      
      .menu-item-img-modern {
        height: 150px;
      }
      
      .category-tabs-modern {
        gap: 0.5rem;
      }
      
      .category-tab-btn {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
      }
      
      .about-home-section-modern {
        padding: 1.5rem;
        border-radius: 16px;
      }
      
      .scroll-indicator {
        display: none;
      }
    }
    
    @media (max-width: 576px) {
      .hero-badge {
        font-size: 0.75rem;
        padding: 0.375rem 0.75rem;
      }
      
      .hero-welcome-modern {
        padding: 1.5rem 0.5rem;
        min-height: 70vh;
      }
      
      .hero-welcome-title-modern {
        font-size: 1.5rem;
      }
      
      .hero-subtitle-modern {
        font-size: 0.875rem;
      }
      
      .hero-stats {
        gap: 0.75rem;
        margin-top: 1.25rem;
      }
      
      .stat-item {
        flex: 1;
        min-width: 70px;
      }
      
      .stat-number {
        font-size: 1.25rem;
      }
      
      .stat-label {
        font-size: 0.75rem;
      }
      
      .featured-title-modern {
        font-size: 1.1rem;
      }
      
      .menu-item-name-modern {
        font-size: 0.875rem;
      }
      
      .menu-item-price {
        font-size: 0.95rem;
      }
      
      .about-home-section-modern {
        padding: 1.25rem;
      }
      
      .section-title-modern {
        font-size: 1.75rem;
      }
      
      .container-xxl {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
      }
    }
    
    /* ===== SIMPLE HERO STYLES ===== */
    .hero-simple {
      background: linear-gradient(135deg, var(--green) 0%, var(--green-700) 100%);
      padding: 4rem 1rem;
      border-radius: 16px;
      color: #fff;
    }
    
    .hero-title {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 800;
      font-family: 'Playfair Display', serif;
    }
    
    .hero-subtitle {
      font-size: clamp(1rem, 2vw, 1.25rem);
      color: rgba(255,255,255,0.9);
      max-width: 600px;
      margin: 0 auto;
    }
    
    .section-title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--text);
      font-family: 'Playfair Display', serif;
    }
    
    .text-primary {
      color: #fbbf24 !important;
    }
    
    @media (max-width: 768px) {
      .hero-simple {
        padding: 3rem 1rem;
      }
      
      .section-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container-fluid px-4 px-lg-5">
    <!-- Logo -->
    <a class="navbar-brand fw-bold logo-script me-4 me-lg-5" href="/" style="font-size: 1.8rem;">
      <i class="fas fa-coffee me-2"></i>LandCaffe
    </a>
    
    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-dark"></i>
    </button>
    
    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="mainNav">
      <div class="d-flex justify-content-between w-100">
        <!-- Left Side - Menu Items -->
        <ul class="navbar-nav mb-3 mb-lg-0 ms-lg-3">
          <li class="nav-item me-3">
            <a class="nav-link position-relative px-3 py-2 @if(request()->routeIs('home')) active @endif" href="{{ route('home') }}">
              <i class="fas fa-home me-1 d-lg-none"></i> Beranda
              <span class="nav-link-underline"></span>
            </a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link position-relative px-3 py-2 @if(request()->routeIs('public.menu')) active @endif" href="{{ route('public.menu') }}">
              <i class="fas fa-utensils me-1 d-lg-none"></i> Menu
              <span class="nav-link-underline"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative px-3 py-2 @if(request()->routeIs('public.about')) active @endif" href="{{ route('public.about') }}">
              <i class="fas fa-info-circle me-1 d-lg-none"></i> Tentang
              <span class="nav-link-underline"></span>
            </a>
          </li>
        </ul>
      
        <!-- Right Side Actions -->
        <ul class="navbar-nav align-items-lg-center gap-3">
        @guest
          <li class="nav-item">
            <a class="btn btn-warning px-4 fw-semibold d-flex align-items-center" href="{{ route('login') }}">
              <i class="fas fa-sign-in-alt me-2"></i> Login
            </a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar-sm me-2">
                <div class="avatar-initials">{{ substr(auth()->user()->name, 0, 2) }}</div>
              </div>
              <span class="d-none d-lg-inline fw-medium">{{ auth()->user()->name }}</span>
              <i class="fas fa-chevron-down ms-1 small d-none d-lg-inline"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 overflow-hidden mt-2" style="min-width: 220px;">
              <li>
                <a class="dropdown-item d-flex align-items-center py-2 px-3" href="{{ route('dashboard') }}">
                  <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard
                </a>
              </li>
              <li><hr class="dropdown-divider my-1"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item d-flex align-items-center py-2 px-3 text-danger w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
        </ul>
      </div>
  </div>
</nav>
<div class="navbar-spacer" style="height: 76px;"></div>

<div class="container-fluid px-3 px-md-4 my-4">
  <div class="container-xxl">
    @yield('content')
  </div>
</div>

@hasSection('footer')
  <footer class="footer">
    <div class="container">
      @yield('footer')
    </div>
  </footer>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
  
  // Initialize tooltips
  document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Add active class to mobile menu items
    const navLinks = document.querySelectorAll('.nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        // Close mobile menu when clicking a link
        if (window.innerWidth <= 991.98) {
          const bsCollapse = new bootstrap.Collapse(navbarCollapse, {toggle: false});
          bsCollapse.hide();
          
          // Add active class with a slight delay for better UX
          navLinks.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
          
          // Prevent default if it's a dropdown toggle
          if (this.classList.contains('dropdown-toggle')) {
            e.preventDefault();
          }
        }
      });
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.navbar') && !e.target.classList.contains('dropdown-menu')) {
        const openDropdown = document.querySelector('.dropdown-menu.show');
        if (openDropdown) {
          const dropdown = bootstrap.Dropdown.getInstance(openDropdown.previousElementSibling);
          if (dropdown) dropdown.hide();
        }
      }
    });
    
    // Remove focus outline when clicking on nav items (for mouse users)
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('mousedown', function(e) {
        this.style.outline = 'none';
      });
      link.addEventListener('focus', function(e) {
        if (this.matches(':focus-visible')) {
          this.style.outline = 'none';
          this.style.boxShadow = '0 0 0 2px rgba(139, 94, 60, 0.2)';
        } else {
          this.style.boxShadow = 'none';
        }
      }, true);
    });
  });
</script>
</body>
</html>
