<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkblue">
    <div class="container">
      <img src="/img/logo_tegal.png" height="50px" alt="">
      <a class="navbar-brand font-weight-bolder" href="#"><h6 class="animate-character">Desa Demangharjo</h6></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Beranda</a> 
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link {{ Request::is('about*') ? "active" : "" }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tentang Demangharjo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/about/structure">Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="/about/vision">Visi & Misi</a></li>
              <li><a class="dropdown-item" href="/about/apbd">Transparansi APBDesa</a></li>
              <li><a class="dropdown-item" href="/about/destination">Tempat Wisata</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blog') ? "active" : "" }}" href="/blog">Seputar Demangharjo</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? "active" : "" }}" href="/categories">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('room') ? "active" : "" }}" href="/room">Bilik Aduan</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown ms-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard/reports"><i class="bi bi-menu-button-wide-fill"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </ul>
          </li>
        @else
          
            <li class="nav-item">
              <a class="nav-link {{ Request::is('login') ? "active" : "" }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          
        @endauth
        </ul>
      </div>
    </div>
</nav>