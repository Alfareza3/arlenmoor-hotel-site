<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="flex-grow-1 position-relative">

  <section class="hero-slider position-relative" style="height: 90vh;">
    <div id="hero-images">
      <div class="slide active" style="background-image: url('assets/img/hero2-bg.jpg');"></div>
      <div class="slide" style="background-image: url('assets/img/hero4-bg.jpg');"></div>
      <div class="slide" style="background-image: url('assets/img/hero3-bg.jpg');"></div>
    </div>
    <div class="hero-content text-white d-flex align-items-center justify-content-center flex-column text-center">
      <h1 class="display-4 fw-bold">Welcome to The Arlenmoor</h1>
      <p class="lead">Where Elegance Lives Forever</p>
      <a href="kamar.php" class="btn btn-outline-light btn-lg mt-3">Lihat Kamar</a>
    </div>
  </section>

  <section class="deskripsi-section d-flex align-items-center text-white text-center">
    <div class="container p-5">
      <h2 class="mb-3">Kemewahan Bernuansa Klasik</h2>
      <p>
        The Arlenmoor adalah hotel bergaya klasik megah yang berdiri sejak abad ke-19. Dirancang untuk para tamu yang menghargai keheningan, keindahan arsitektur, dan pelayanan penuh wibawa.
      </p>
      <p>
        Nikmati suasana berkelas, interior elegan, serta layanan personal yang menghadirkan kenyamanan dalam keheningan klasik.
      </p>
    </div>
  </section>

  <section class="fasilitas-section py-5 bg-dark text-white">
    <div class="container">
      <h2 class="text-center mb-4">Fasilitas Unggulan</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card bg-dark border-0 text-white shadow-sm h-100">
            <img src="assets/img/finedining.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Fine Dining">
            <div class="card-body">
              <h5 class="card-title text-warning">🍷 Fine Dining</h5>
              <p class="card-text small">Restoran eksklusif dengan sajian klasik Eropa dan pelayanan terbaik.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card bg-dark border-0 text-white shadow-sm h-100">
            <img src="assets/img/library.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Perpustakaan">
            <div class="card-body">
              <h5 class="card-title text-warning">📚 Perpustakaan Tua</h5>
              <p class="card-text small">Tempat membaca tenang dengan koleksi buku klasik sejak abad ke-19.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card bg-dark border-0 text-white shadow-sm h-100">
            <img src="assets/img/butler.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Butler Pribadi">
            <div class="card-body">
              <h5 class="card-title text-warning">🤵 Butler Pribadi</h5>
              <p class="card-text small">Layanan personal eksklusif untuk kamar suite dengan staf profesional.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimoni-section bg-black text-white py-5">
    <div class="container">
      <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif;">Apa Kata Mereka</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="p-4 border border-secondary rounded h-100 bg-dark bg-opacity-50">
            <p class="fst-italic">
              “Saya benar-benar merasa seperti kembali ke masa lalu yang mewah. Interior hotel begitu anggun, dan staf melayani dengan penuh kehormatan.”
            </p>
            <p class="mb-0"><strong>Clara V.</strong><br><small>Tamu dari Paris</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border border-secondary rounded h-100 bg-dark bg-opacity-50">
            <p class="fst-italic">
              “The Arlenmoor adalah tempat ideal untuk refleksi dan istirahat. Tidak pernah saya merasa selega ini dalam sebuah hotel klasik.”
            </p>
            <p class="mb-0"><strong>James L.</strong><br><small>Penulis Perjalanan</small></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border border-secondary rounded h-100 bg-dark bg-opacity-50">
            <p class="fst-italic">
              “Setiap detail ruangan tampak seperti karya seni. Saya menginap tiga malam dan rasanya tidak cukup. Butler-nya luar biasa sopan.”
            </p>
            <p class="mb-0"><strong>Sophia M.</strong><br><small>Interior Designer</small></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info-links py-5 bg-dark text-white text-center">
    <div class="container">
      <h3 class="mb-4">Jelajahi Lebih Lanjut</h3>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="tentang.php" class="btn btn-outline-warning">Tentang Kami</a>
        <a href="kamar.php" class="btn btn-outline-light">Kamar & Suite</a>
        <a href="kontak.php" class="btn btn-outline-light">Hubungi Kami</a>
        <a href="reservasi.php" class="btn btn-outline-light">Pesan Sekarang</a>
      </div>
    </div>
  </section>

</main>

<nav class="mobile-nav d-md-none bg-dark text-white d-flex justify-content-around py-2 fixed-bottom shadow-lg">
  <a href="index.php" class="text-warning text-center small">
    <div>🏠</div><div>Beranda</div>
  </a>
  <a href="kamar.php" class="text-white text-center small">
    <div>🛏️</div><div>Kamar</div>
  </a>
  <a href="kontak.php" class="text-white text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-white text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>

<style>
  .hero-slider {
    position: relative;
    overflow: hidden;
  }
  #hero-images {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    z-index: 0;
  }
  .slide {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
  }
  .slide.active {
    opacity: 1;
    z-index: 1;
  }
  .hero-content {
    position: relative;
    z-index: 2;
    height: 100%;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6));
    padding: 0 1rem;
  }
  .deskripsi-section {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
    min-height: 60vh;
    padding: 60px 0;
  }
  .mobile-nav a {
    text-decoration: none;
    flex: 1;
  }
  .mobile-nav a:hover {
    background: rgba(255,255,255,0.05);
  }
</style>

<script>
  const slides = document.querySelectorAll('.slide');
  let current = 0;
  setInterval(() => {
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
  }, 4000);
</script>
