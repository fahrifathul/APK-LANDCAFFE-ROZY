@extends('public.layouts.app')

@section('title', 'Tentang - LandCaffe')

@section('content')
  <div class="hero mb-4 position-relative">
    <div class="hero-overlay"></div>
    <div class="container py-5 hero-content">
      <div class="hero-content-inner text-center">
        <div class="brand-pill mb-3 d-inline-flex">Tentang Kami</div>
        <h1 class="display-6 fw-bold">Cerita di balik secangkir kenangan</h1>
        <p class="lead">Di balik secangkir kopi, selalu ada cerita yang mengalir. ada kisah petani yang merawat biji dengan penuh kesabaran, ada barista yang menyeduh dengan hati, dan ada momen berharga yang lahir ketika kopi bertemu dengan penikmatnya..</p>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-7">
      <div class="about-card h-100">
        <h3 class="mb-3">Siapa kami</h3>
        <p class="lead" style="margin-bottom: .75rem;">LandCaffe lahir dari semangat menghadirkan tempat berkumpul yang nyaman dengan sajian berkualitas. Kami percaya setiap cangkir kopi punya cerita. Begitu juga setiap hidangan yang kami buat untuk menemani harimu.</p>
        <p class="lead" style="margin-bottom: 0;">Kami berkomitmen untuk kualitas rasa, pelayanan ramah, dan pengalaman yang berkesan.</p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="about-card h-100">
        <h5 class="mb-3">Info Kontak</h5>
        <ul class="info-list mb-0">
          <li>
            <span class="icon-circle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><polyline points="22,6 12,13 2,6"/></svg>
            </span>
            <div><strong>Email</strong><div class="text-muted">Landcaffe09@gmail.com</div></div>
          </li>
          <li>
            <span class="icon-circle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92V21a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a2 2 0 0 1 2 1.72c.12.81.3 1.6.54 2.36a2 2 0 0 1-.45 2.11L10 10a16 16 0 0 0 6 6l.81-1.18a2 2 0 0 1 2.11-.45c.76.24 1.55.42 2.36.54A2 2 0 0 1 22 16.92z"/></svg>
            </span>
            <div><strong>Telepon</strong><div class="text-muted">083820132476</div></div>
          </li>
          <li>
            <span class="icon-circle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </span>
            <div><strong>Alamat</strong><div class="text-muted">Jl. Soekarno Hatta No. 192, Kota Bandung</div></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
