<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <style>
    </style>
  </head>
  <body>
    <section class="mt-5 py-5">
    </section>
    <section class="mt-5 py-5">
    </section>
    <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8 d-flex justify-content-end ">
          <div class="mt-3 judul">Himpunan<span class="sp1">Mahasiswa</span><span class="sp2">Elektro</span></div>
        </div>
        <div class="col-md-4">
          @if(session()->has('loginError'))
          <div class="alert alert-light alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <form action="/Login/Autentikasi" method="post">
            @csrf
          <div class="mb-3 row">
            <div class="col-sm-10 d-flex justify-content-end">
              <input type="text" class="teks @error('username') is-invalid @enderror" style="width: 100%; height:130%;" placeholder="username" name="username" required>
            </div>
            @error('username')
                <div class="text-light">
                  {{ $message }}
               </div>
               @enderror
          </div>
          <div class="mb-3 row">
            <div class="col-sm-10 d-flex justify-content-end">
              <input type="password"  id="password"  style="width: 100%; height:130%;" placeholder="password" name="password" required  class="@error('password') is-invalid @enderror">
              @error('password')
                <div class="text-light">
                  {{ $message }}
               </div>
               @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-sm-10 d-flex justify-content-end">
              <button class="login" style="width:100%; height:120%;">Login</button>
            </div>
          </div>`
        </form>
       </div>
    </div>
  </section>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
