<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary  fixed-top unav mb-4" id="navbar">
        <div class="container">
          <a class="navbar-brand text-white" href="/Berita" style="font-family: 'Lobster', cursive;">Halaman Berita HME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto lii">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/Login">Login disini</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white w1" onclick="warna()" href="#warna" ><i class="bi bi-lightbulb " style="font-size: 20px;"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="mt-5 py-2">
        <div class="container mt-5">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <article>
                      <h2>{{ $postingan->title}}</h2>
                      <p>By, {{ $postingan->User->name }}</a> in  {{ $postingan->Kategori->name }} </p></a>
                      
                      @if ($postingan->image)
                      <div style="max-height: 350px; overflow:hidden">
                       <img src="{{ asset('storage/'.$postingan->image) }}" alt="/img/{{ $postingan->img}}" class="img-fluid">
                      </div>
                    
                     @else
                     <img src="https://source.unsplash.com/800x400?{{ $postingan->Kategori->name }}" alt="{{ $postingan->Kategori->name }}" class="img-fluid ">
                     @endif
                       <p>{!! $postingan->body !!}</p>
                   
                       <a href="/Berita" class="text-decoration-none btn btn-success"> <- Kembali ke halaman </a>
                   </article>
              </div>
          </div>
      </div>
      </section>
      
    <script src="/js/jquery-3.6.3.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/js/scriptdetailberita.js"></script>
  </body>
</html>