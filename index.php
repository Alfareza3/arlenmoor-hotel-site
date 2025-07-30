<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="flex-grow-1 position-relative">

  <!-- HERO SLIDER -->
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

<!-- DESKRIPSI DENGAN BACKGROUND FULL TRANSPARAN -->
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


</main>

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

  .deskripsi-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
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
