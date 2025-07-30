<?php
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="flex-grow-1">
  <section class="tentang-section text-white d-flex align-items-center" style="
    min-height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('assets/img/hero7-bg.webp') center/cover no-repeat;
    background-attachment: fixed;
    padding: 80px 0;
  ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="p-4 text-white">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif;">Tentang <span class="text-warning">The Arlenmoor</span></h2>
            <p><strong>The Arlenmoor</strong> adalah hotel bergaya klasik Eropa yang berdiri sejak abad ke-19. Dengan filosofi <em>timeless elegance</em>, kami melayani tamu yang mencari keheningan, kemewahan arsitektur lawas, dan pelayanan yang berkelas.</p>

            <p>Terletak di jantung kota tua, hotel ini memadukan suasana tenang dengan lokasi strategis. Fasilitas unggulan kami meliputi restoran fine-dining, ballroom mewah, perpustakaan tua, dan layanan butler pribadi untuk kamar suite.</p>

            <p>Kami percaya pengalaman menginap bukan hanya tempat tidur, tapi bagaimana Anda dihargai. Selamat datang di The Arlenmoor tempat elegan yang hidup dari generasi ke generasi.</p>

            <div class="text-center mt-4">
              <a href="index.php" class="btn btn-outline-light btn-sm">← Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<style>
    .mobile-nav a {
    text-decoration: none;
    flex: 1;
  }

  .mobile-nav a:hover {
    background: rgba(255,255,255,0.05);
  }
</style>
<nav class="mobile-nav d-md-none bg-dark text-white d-flex justify-content-around py-2 fixed-bottom shadow-lg">
  <a href="index.php" class="text-white text-center small">
    <div>🏠</div><div>Beranda</div>
  </a>
  <a href="kamar.php" class="text-white text-center small">
    <div>🛏️</div><div>Kamar</div>
  </a>
  <a href="reservasi.php" class="text-white text-center small">
    <div>📝</div><div>Pesan Kamar</div>
  </a>
  <a href="kontak.php" class="text-white text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-warning text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
