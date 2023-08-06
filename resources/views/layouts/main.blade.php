<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
      body {
        background: rgba(0, 0, 0, 0.7);
        background-blend-mode: darken;
        background-attachment: fixed;
        background-image: url('/img/pandemidua.jpg');
      }
    </style>
    <link rel="icon" href="/img/logo_tegal.png">
  </head>
  <body class="d-flex flex-column h-100">
    @include('partials/navbar')
    <div class="container mt-4">
        @yield('container')
    </div>


    <div class="b-example-divider"></div>

    <footer class="footer mt-auto bg-dark">
      <div class="container-fluid bg-dark" >
        <footer class="py-3">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item "><a href="/home" class="text-light nav-link px-2 text-body-secondary">Beranda</a></li>
            <li class="nav-item "><a href="/about" class="text-light nav-link px-2 text-body-secondary">Tentang Demangharjo</a></li>
            <li class="nav-item "><a href="/blog" class="text-light nav-link px-2 text-body-secondary">Seputar Demangharjo</a></li>
            <li class="nav-item "><a href="/categories" class="text-light nav-link px-2 text-body-secondary">Kategori</a></li>
            <li class="nav-item "><a href="/room" class="text-light nav-link px-2 text-body-secondary">Bilik Aduan</a></li>
          </ul>
          <p class="text-center text-light text-body-secondary">&copy; 2023 Website Desa Demangharjo</p>
        </footer>
      </div>
    </footer>
    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
</html>