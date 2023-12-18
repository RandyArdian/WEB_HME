<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Awal</title>
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
              @guest
              <li class="nav-item">
                <a class="nav-link text-white" href="/Login">Login disini</a>
              </li> 
              @endguest
              <li class="nav-item">
                <a class="nav-link text-white w1" onclick="warna()" href="#warna" ><i class="bi bi-lightbulb " style="font-size: 20px;"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-3">
        <div class="row mt-5 px-5">
          <form action="/Berita" method="post">
            @csrf
            <h1 class="mt-3">Berita</h1>
            <div class="row  align-items-center"> 
              <div class="col-lg-5">
                <input type="text" class="form-control" name="search" placeholder="Ketikan sesuatu" value="{{ request('search') }}" required>
              </div>
              <div class="col-auto py-2">
                <select class="form-select" aria-label="Default select example" name="op" id="op">
                  <option value="all" @if($kategorii=='all') {{ 'selected' }} @endif>Pilih Kategori || all</option>
                  @foreach( $Kategori as $k)
                    <option value="{{ $k->id }}" @if($kategorii==$k->id) {{ 'selected' }} @endif>{{ $k->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                  <button class="btn btn-primary col-sm-12" type="submit"> Cari </button>
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="container mt-3">
        <div class="row">
          @foreach ($postingan as $berita)
          <div class="col-md-4 mb-3">
            <div class="card" >
              <div class="position-absolute bg-dark px-3 py-2 " style="background-color:rgba(0, 0, 0, 0.7); opacity:0.8;"><a href="/posts?Kategori={{ $berita->Kategori->slug }}" class="text-decoration-none text-white">{{ $berita->Kategori->name }}</a></div>
              @if ($berita->image)
               <img src="{{ asset('storage/'.$berita->image) }}" alt="{{ asset('storage/'.$berita->image) }}" class="card-img-top ">
             @else
             <img src="https://source.unsplash.com/500x500?{{ 'electrical' }}" class="card-img-top" alt="{{ $berita->Kategori->name }}">
             @endif
              <div class="card-body">
                <h5 class="card-title">{{ $berita->title}}</h5>
                <p>
                  <small> By.<a href="/posts?User={{ $berita->User->name }}" class="text-decoration-none">{{ $berita->User->name }}</a> {{ $berita->created_at->diffForHumans() }}
                  </small>
                </p>
                <p class="card-text">{{ $berita->excerpt}}</p>
                <a href="/DetailBerita/{{ $berita->slug }}" class="btn btn-primary">Read more</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="d-flex justify-content-end">
        {{-- memakai pagination --}}
          {{ $postingan->links() }}
       </div>
    <script src="/js/jquery-3.6.3.min.js"></script>
   <script src="/js/script.js">
   </script>
    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
