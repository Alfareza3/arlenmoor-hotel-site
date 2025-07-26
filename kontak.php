<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

// Proses kirim pesan (jika disubmit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];
  $waktu = date('Y-m-d H:i:s');

  mysqli_query($conn, "INSERT INTO kontak (nama, email, pesan, waktu) VALUES ('$nama', '$email', '$pesan', '$waktu')");
  $berhasil = true;
}
?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Kontak Kami</h2>

  <?php if (isset($berhasil)) : ?>
    <div class="alert alert-success text-center">Pesan kamu berhasil dikirim!</div>
  <?php endif; ?>

  <form method="POST" class="mx-auto" style="max-width: 600px;">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Pesan</label>
      <textarea name="pesan" rows="4" class="form-control" required></textarea>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Kirim</button>
      <a href="index.php" class="btn btn-outline-secondary btn-sm">← Kembali ke Beranda</a>
    </div>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
