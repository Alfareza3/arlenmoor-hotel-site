<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];
  $waktu = date('Y-m-d H:i:s');

  mysqli_query($conn, "INSERT INTO kontak (nama, email, pesan, waktu) VALUES ('$nama', '$email', '$pesan', '$waktu')");
  $berhasil = true;
}
?>

<style>
.form-kontak {
  background-color: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 40px;
  border-radius: 15px;
  backdrop-filter: blur(5px);
}

.form-kontak label {
  color: #fff;
}

.form-kontak .form-control {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: #fff;
}

.form-kontak .form-control::placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.form-kontak .form-control:focus {
  background-color: rgba(255, 255, 255, 0.15);
  color: #fff;
}

  .mobile-nav a {
    text-decoration: none;
    flex: 1;
  }

  .mobile-nav a:hover {
    background: rgba(255,255,255,0.05);
  }
</style>

<section style="
  background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
              url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
  min-height: 100vh;
  padding: 60px 0;
">
  <div class="container">
    <h2 class="mb-4 text-center text-white">Kontak Kami</h2>

    <?php if (isset($berhasil)) : ?>
      <div class="alert alert-success text-center">Pesan kamu berhasil dikirim!</div>
    <?php endif; ?>

    <form method="POST" class="form-kontak shadow mx-auto" style="max-width: 600px;">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required placeholder="Nama lengkap">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required placeholder="Alamat email">
      </div>
      <div class="mb-3">
        <label class="form-label">Pesan</label>
        <textarea name="pesan" rows="4" class="form-control" required placeholder="Tulis pesan kamu..."></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-light px-4">Kirim</button>
      </div>
      <div class="text-center mt-3">
        <a href="index.php" class="btn btn-outline-light btn-sm">← Kembali ke Beranda</a>
      </div>
    </form>
  </div>
</section>

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
  <a href="kontak.php" class="text-warning text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-white text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
