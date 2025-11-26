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
        <ul class="list-unstyled mb-0">
          <li class="d-flex align-items-center mb-4">
            <div class="icon-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(46, 125, 50, 0.1); border-radius: 50%;">
              <i class="fas fa-envelope text-success" style="font-size: 1.1rem;"></i>
            </div>
            <div>
              <div class="fw-bold text-success">Email</div>
              <div class="text-muted">Landcaffe09@gmail.com</div>
            </div>
          </li>
          <li class="d-flex align-items-center mb-4">
            <div class="icon-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(46, 125, 50, 0.1); border-radius: 50%;">
              <i class="fas fa-phone-alt text-success" style="font-size: 1.1rem;"></i>
            </div>
            <div>
              <div class="fw-bold text-success">Telepon</div>
              <div class="text-muted">083820132476</div>
            </div>
          </li>
          <li class="d-flex align-items-center">
            <div class="icon-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(46, 125, 50, 0.1); border-radius: 50%;">
              <i class="fas fa-map-marker-alt text-success" style="font-size: 1.1rem;"></i>
            </div>
            <div>
              <div class="fw-bold text-success">Alamat</div>
              <div class="text-muted">Jl. Soekarno Hatta No. 192, Kota Bandung</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
