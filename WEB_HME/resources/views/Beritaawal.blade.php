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
    <nav class="navbar navbar-expand-lg bg-body-tertiary  fixed-top unav" id="navbar">
      <div class="container">
        <a class="navbar-brand text-white" href="#" style="font-family: 'Lobster', cursive;">Halaman Berita HME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto lii">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#kategori">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/Berita">Berita</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link text-white" href="/Dashboard">Dashboard</a>
            </li>
            @endauth
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
    <section class="unav mb-5 mt-4" id="home">
      <div class="container">
        <div class="row mb-4 q">
          <div class="col-lg-6 mt-5 text-center py-5 mb-2">
            <img  src="img/HME.jpg" alt="" class="img-fluid rounded-circle shadow-sm gsap1" style="width: 400px; height: 350px"  />
          </div>
          <div class="col-lg-6 mt-5 py-5 px-5" >
            <h1 class="text-white mt-5 awal"style="font-family: 'Lobster', cursive;" ></h1>
            <h7 class="text-white mb-4 d-block akhir" style="font-family: 'Lobster', cursive;">Dapatkan informasi praktikum disini</h7>
            <a class="btn border-white text-white button cari" href="/Berita" style="font-family: 'Lobster', cursive;">Cari disini</a>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="border-bottom:2px solid blue">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L80,133.3C160,139,320,149,480,138.7C640,128,800,96,960,85.3C1120,75,1280,85,1360,90.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
        ></path>
      </svg>
    </section>
    <section class="mb-3">
      <div class="container">
        <div class="row justify-content-center" style=" background-color: azure; border: 2px solid blueviolet; border-radius: 20px;" >
          <div class="col-md tombolmuncul tombol1" onclick="tombol1()">
            <div class="d-flex justify-content-center">
              Foto lama
            </div>
          </div>
          <div class="col-md-4 tombol2" style="cursor: pointer;" onclick="tombol2()">
            <div class="d-flex justify-content-center">
              Foto baru
            </div>
          </div>
          <div class="col-md-4 tombol3 " style="cursor: pointer;" onclick="tombol3()">
            <div class="d-flex justify-content-center">
              Anggota himpunan
            </div>
          </div>
        </div>
       </div>   
    </section>
    <section class="foto mb-3">
          <div class="container shadow-sm mt-2 mb-4 " style=" border-radius:5px;">
            <div class="row ">
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/baru1.jpg" class="card-img" alt="Web Programming" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/baru2.jpg" class="card-img" alt="Web Programming" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450" >
                  <img src="img/baru3.jpg" class="card-img" alt="Web Programming" style="height:278px;"/>
                </div>
              </div>
            </div>
          </div>
    </section>
    <section id="about" class="unav">
      <div class="container"  data-aos-delay="50"
      data-aos-duration="1000"  data-aos="fade-in" data-aos-offset="200">
        <div class="row">
          <div class="col-lg text-center mt-5">
            <h1 class="text-white">About</h1>
          </div>
        </div>
        <div class="row " >
          <div class="col-lg-6 mt-5 mb-4">
            <p class="text-center text-white as">HME adalah organisasi yang berfungsi sebagai wadah aspirasi mahasiswa, serta mengasah dan meningkatkan kreativitas, kemampuan dan keterampilan baik hard-skill maupun soft-skill baik di bidang organisasi, bidang ilmiah maupun minat dan bakat.
            </p>
          </div>
          <div class="col-lg-6 mt-5 mb-4">
           <p class="text-center text-white ab">Himpunan mahasiswa Teknik Elektro (HME) aktif melaksanakan event baik di lingkungan Universitas Mataram ataupun mengikuti event regional dan nasional</p>
          </div>
        </div>
      </div>
    </section>
    <section id="kategori"  style="padding-top: 4rem;">
      <div class="container">
        <div class="row mb-3">
          <div class="col-lg text-center">
            <h3 style="color: #9309f2" data-aos="fade-right"
            data-aos-offset="300"
            data-aos-easing="ease-in-sine">Daftar kategori berita</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <a href="#">
              <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="100">
                <img src="img/1.jpg" class="card-img" alt="Web Programming" />
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7); opacity: 0.6">Praktikum</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="#">
              <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="350">
                <img src="img/2.jpg" class="card-img" alt="Web Programming" />
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7); opacity: 0.6">Matakuliah</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="#">
              <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                <img src="img/3.jpg" class="card-img" alt="Web Programming" />
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7); opacity: 0.6">Acara</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="unav"  id="footer">
      <div class="container">
        <div class="row" >
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,256L48,245.3C96,235,192,213,288,218.7C384,224,480,256,576,272C672,288,768,288,864,261.3C960,235,1056,181,1152,170.7C1248,160,1344,192,1392,208L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
      </svg>
      <footer class="text-center pb-3">
        <h7 class="text-white">Created with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg> by Randy Ardiansyah</h7>
      </footer>
    </section>
    <!-- script Aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
     <!-- End Script Aos -->
   <!-- Gsap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
   <!-- Plugin text gsap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
   <!-- end plugin text gsap -->
   <script>
    gsap.from('.gsap1',{duration:2,y:-100,opacity:0,ease:'bounce'});
    gsap.from('.navbar',{duration:1.5,y:'100%',opacity:0,ease:'bounce'})
    
    // <!-- install plugin gsap -->
      gsap.registerPlugin(TextPlugin);
      // kalo pake to kosong kan dulu
      gsap.to('.awal',{duration:5,delay:1,text:'Cari tahu berita Himpunan Mahasiswa Elektro Unram disini !!'})
      // kalo pake from
      gsap.from('.akhir',{duration:5,delay:3,text:""})
      gsap.from('.cari',{duration:5,delay:4,y:-100, opacity:0 ,ease:'bounce'})
      gsap.from('.as',{duration:5,delay:3,text:""})
      gsap.from('.ab',{duration:8,delay:5,text:""})
  //  <!-- end install plugin -->
   </script>
   <!-- End GSAP -->
   <script src="/js/jquery-3.6.3.min.js"></script>
   <script src="/js/script.js"></script>
    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
