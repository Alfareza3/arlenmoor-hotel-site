<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

if (!isset($_GET['id'])) {
  echo "<div class='container py-5 text-white'><p class='text-danger'>Kamar tidak ditemukan.</p></div>";
  include 'includes/footer.php';
  exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = $id");
$kamar = mysqli_fetch_assoc($query);

if (!$kamar) {
  echo "<div class='container py-5 text-white'><p class='text-danger'>Kamar tidak tersedia.</p></div>";
  include 'includes/footer.php';
  exit;
}
?>

<style>
body {
  background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
              url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
  color: white;
}

.transparan-box {
  background: transparent;
  padding: 30px;
  border-radius: 15px;
  color: white;
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
}


  .mobile-nav a {
    text-decoration: none;
    flex: 1;
  }

  .mobile-nav a:hover {
    background: rgba(255,255,255,0.05);
  }

</style>

<div class="container py-5">
  <div class="transparan-box">
    <div class="row">
      <div class="col-md-6 mb-4">
        <img src="assets/img/<?php echo $kamar['foto']; ?>" class="img-fluid rounded shadow" alt="Foto Kamar">
      </div>
      <div class="col-md-6 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 mt-4">
        <h2><?php echo $kamar['nama_kamar']; ?></h2>
        <p class="text-light mb-1">Rp <?php echo number_format($kamar['harga_per_malam']); ?> / malam</p>
        <p><?php echo $kamar['deskripsi']; ?></p>
        <p><strong>Fasilitas:</strong><br><?php echo nl2br($kamar['fasilitas']); ?></p>
        <a href="reservasi.php?id=<?php echo $kamar['id_kamar']; ?>" class="btn btn-success mt-3">Reservasi Sekarang</a>
      </div>
      <div class="col-md-6 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 mt-4"><a href="kamar.php" class="btn btn-outline-light mt-2">← Kembali ke Daftar Kamar</a></div>
    </div>
  </div>
</div>

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
  <a href="tentang.php" class="text-white text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
