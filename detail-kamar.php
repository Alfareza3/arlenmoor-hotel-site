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
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
              url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
  color: white;
}

.transparan-box {
  background-color: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  padding: 30px;
}

.badge-premium {
  background-color: gold;
  color: #333;
  font-weight: bold;
  margin-bottom: 10px;
}

h2 {
  font-family: 'Playfair Display', serif;
  font-size: 32px;
}

.kamar-info {
  font-size: 16px;
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
    <div class="row align-items-center">
      <div class="col-md-6 mb-4">
        <img src="assets/img/<?php echo $kamar['foto']; ?>" class="img-fluid rounded shadow" alt="Foto <?php echo $kamar['nama_kamar']; ?>">
      </div>

      <div class="col-md-6">
        <?php if ($kamar['harga_per_malam'] >= 2000000): ?>
          <span class="badge badge-premium px-3 py-2">🏅 Premium Suite</span>
        <?php endif; ?>

        <h2 class="mt-2"><?php echo $kamar['nama_kamar']; ?></h2>
        <p class="text-warning fw-bold fs-5">Rp <?php echo number_format($kamar['harga_per_malam']); ?> <span class="fs-6">/ malam</span></p>

        <div class="kamar-info">
          <p><?php echo nl2br($kamar['deskripsi']); ?></p>
          <p><strong>Fasilitas:</strong><br><?php echo nl2br($kamar['fasilitas']); ?></p>
        </div>

        <a href="reservasi.php?id=<?php echo $kamar['id_kamar']; ?>" class="btn btn-success mt-3">📝 Reservasi Sekarang</a>
        <a href="kamar.php" class="btn btn-outline-light mt-3 ms-2">Kembali</a>
      </div>
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
  <a href="kontak.php" class="text-white text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-white text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
