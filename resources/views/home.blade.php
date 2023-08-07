@extends('layouts/main')

@section('container')
  <h1 class="text-light text-center mb-3">Selamat Datang</h1>

  <div id="carouselExampleCaptions" class="carousel slide mb-3">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/img/logo_tegal.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Selamat datang di Desa Demangharjo</h3>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/img/sawah.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="border-black">Sumber Daya Alam</h3>
          <p>Demangharjo penuh dengan sumber daya alam yang melimpah</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/img/pandemi.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Wisata</h3>
          <p>Pantai Demangharjo Indah (Pandemi), landmark Desa Wisata Demangharjo </p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection
