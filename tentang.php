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
        <div class="col-lg-9">
          <div class="p-4 text-white">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; font-size: 2.5rem;">
              Mengenal <span class="text-warning">The Arlenmoor</span>
            </h2>

            <p class="lead mb-4" style="font-weight: 300; text-align: justify;">
              Didirikan pada akhir abad ke-19, <strong>The Arlenmoor</strong> bukan sekadar tempat menginap—ia adalah sebuah mahakarya arsitektur klasik yang merangkul nilai-nilai keanggunan abadi. Terletak di jantung kawasan bersejarah kota, hotel ini menawarkan pengalaman menginap yang tak lekang oleh waktu, menyatukan estetika Eropa klasik dengan pelayanan kelas dunia.
            </p>

            <p style="text-align: justify;">
              Filosofi kami adalah <em>“Timeless Elegance, Personal Touch”</em>. Setiap sudut bangunan menceritakan kisah, dari marmer Italia di lobi hingga langit-langit bergaya Baroque di ballroom utama. Dengan staf profesional yang berpengalaman, kami percaya bahwa layanan yang hangat dan penuh perhatian adalah inti dari pengalaman Arlenmoor.
            </p>

            <p style="text-align: justify;">
              The Arlenmoor menjadi pilihan utama para pelancong, pasangan bulan madu, hingga tokoh penting yang mendambakan keheningan, kemewahan, dan keramahan berkelas. Kami mengundang Anda untuk merasakan sendiri perpaduan harmoni sejarah dan kenyamanan modern dalam setiap kunjungan Anda.
            </p>
<!-- Highlight Fasilitas dengan Foto -->
<div class="row text-center mt-5">
  <div class="col-md-4 mb-4">
    <div class="card bg-dark border-0 text-white h-100 shadow-sm">
      <img src="assets/img/finedining.jpg" class="card-img-top" alt="Fine Dining" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title text-warning">🍷 Fine Dining</h5>
        <p class="card-text small">Restoran eksklusif dengan menu klasik Eropa dan koleksi wine terbaik.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card bg-dark border-0 text-white h-100 shadow-sm">
      <img src="assets/img/library.jpg" class="card-img-top" alt="Perpustakaan Tua" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title text-warning">📚 Perpustakaan Tua</h5>
        <p class="card-text small">Ruang baca tenang dengan koleksi langka sejak tahun 1800-an.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card bg-dark border-0 text-white h-100 shadow-sm">
      <img src="assets/img/butler.jpg" class="card-img-top" alt="Butler Pribadi" style="height: 200px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title text-warning">🤵 Butler Pribadi</h5>
        <p class="card-text small">Layanan eksklusif untuk suite: pengatur jadwal, bagasi, hingga dining.</p>
      </div>
    </div>
  </div>
</div>


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
  <a href="kontak.php" class="text-white text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-warning text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
