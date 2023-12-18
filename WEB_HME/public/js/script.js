//fungsi pengubah warna
function warna() {
  const warna = document.querySelector(".w1");
  const navbar = document.querySelector("#navbar");
  const home = document.querySelector("#home");
  const about = document.querySelector("#about");
  const footer = document.querySelector("#footer");
  const a = navbar.classList.toggle("unav");
  navbar.classList.toggle("unav1");

  if (a == true) {
    $(".w1").html(`<i class="bi bi-lightbulb" style="font-size: 20px;"></i>`);
  } else {
    $(".w1").html(`<i class="bi bi-lightbulb-fill" style="font-size: 20px; color:#FFFF0 0;"></i>`);
  }
  home.classList.toggle("unav");
  home.classList.toggle("unav1");
  about.classList.toggle("unav");
  about.classList.toggle("unav1");
  footer.classList.toggle("unav");
  footer.classList.toggle("unav1");
}

const nama = document.querySelector(".navbar-toggler");
const section1 = document.querySelector(".q");

nama.addEventListener("click", function () {
  section1.classList.toggle("mt-5");
  section1.classList.toggle("nama");
});
// tombol
function tombol1() {
  const tombol1 = document.querySelector(".tombol1");
  const tombol2 = document.querySelector(".tombol2");
  const tombol3 = document.querySelector(".tombol3");

  tombol1.classList.add("tombolmuncul");
  tombol2.classList.remove("tombolmuncul");
  tombol3.classList.remove("tombolmuncul");
  $(".foto").html(`
  <div class="container shadow-sm mt-2 mb-4" style=" border-radius:5px;">
            <div class="row">
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
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450" ">
                  <img src="img/baru3.jpg" class="card-img" alt="Web Programming" style="height:278px;"/>
                </div>
              </div>
            </div>
          </div>
  `);
}
function tombol2() {
  const tombol1 = document.querySelector(".tombol1");
  const tombol2 = document.querySelector(".tombol2");
  const tombol3 = document.querySelector(".tombol3");
  tombol2.classList.add("tombolmuncul");
  tombol1.classList.remove("tombolmuncul");
  tombol3.classList.remove("tombolmuncul");
  tombol1.classList.remove("text-white");
  $(".foto").html(`
  <div class="container shadow-sm mt-2 mb-4" style=" border-radius:5px;">
            <div class="row">
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/new1.jpg" class="card-img" alt="Web Programming" style="height:276px;" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/new2.jpg" class="card-img" alt="Web Programming" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/new3.jpg" class="card-img" alt="Web Programming" style="height:276px;"/>
                </div>
              </div>
            </div>
          </div>
  `);
}
function tombol3() {
  const tombol1 = document.querySelector(".tombol1");
  const tombol2 = document.querySelector(".tombol2");
  const tombol3 = document.querySelector(".tombol3");
  tombol2.classList.remove("tombolmuncul");
  tombol1.classList.remove("tombolmuncul");
  tombol3.classList.add("tombolmuncul");
  $(".foto").html(`
  <div class="container shadow-sm mt-2 mb-4" style=" border-radius:5px;" >
            <div class="row">
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/p1.webp" class="card-img" alt="Web Programming" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450">
                  <img src="img/p2.avif" class="card-img" alt="Web Programming" />
                </div>
              </div>
              <div class="col-md-4 mt-3 mb-3">
                <div class="card text-bg-dark" data-aos="zoom-in"  data-aos-delay="450" ">
                  <img src="img/p3.jpg" class="card-img" alt="Web Programming" style="height:278px;"/>
                </div>
              </div>
            </div>
          </div>
  `);
}
