<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

$berhasil = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_reservasi = intval($_POST['id_reservasi']);
  $tanggal_bayar = date('Y-m-d H:i:s');

  $cek = mysqli_query($conn, "SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi");
  if (mysqli_num_rows($cek) === 0) {
    $error = "ID reservasi tidak ditemukan.";
  } else {
    $bukti = $_FILES['bukti_transfer']['name'];
    $tmp   = $_FILES['bukti_transfer']['tmp_name'];
    $ext   = strtolower(pathinfo($bukti, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($ext, $allowed_ext)) {
      $error = "Format file tidak didukung. Hanya gambar (JPG, PNG, WebP) yang diperbolehkan.";
    } else {
      $new_filename = time() . '-' . basename($bukti);
      move_uploaded_file($tmp, "assets/img/" . $new_filename);

      mysqli_query($conn, "INSERT INTO pembayaran (id_reservasi, bukti_bayar, tanggal_bayar) 
                          VALUES ($id_reservasi, '$new_filename', '$tanggal_bayar')");
      $berhasil = true;
    }
  }
}
?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Upload Bukti Pembayaran</h2>

  <?php if ($berhasil): ?>
    <div class="alert alert-success text-center">✅ Bukti pembayaran berhasil dikirim. Menunggu verifikasi.</div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger text-center">❌ <?= $error ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width:600px;">
    <div class="mb-3">
      <label for="id_reservasi">ID Reservasi</label>
      <select name="id_reservasi" id="id_reservasi" class="form-control" required>
        <option value="">-- Pilih Reservasi --</option>
        <?php
        $list = mysqli_query($conn, "SELECT r.id_reservasi, t.nama_lengkap 
                                     FROM reservasi r 
                                     JOIN tamu t ON r.id_tamu = t.id_tamu 
                                     ORDER BY r.id_reservasi DESC");
        while ($r = mysqli_fetch_assoc($list)) {
          echo "<option value='{$r['id_reservasi']}'>#{$r['id_reservasi']} - {$r['nama_lengkap']}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="bukti_transfer">Bukti Transfer (gambar)</label>
      <input type="file" name="bukti_transfer" id="bukti_transfer" accept="image/*" class="form-control" required>
    </div>

    <div class="text-center">
      <button class="btn btn-primary">Kirim</button>
      <a href="index.php" class="btn btn-secondary ms-2">Kembali</a>
    </div>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
