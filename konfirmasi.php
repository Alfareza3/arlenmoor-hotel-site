<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama     = $_POST['nama_lengkap'];
  $email    = $_POST['email'];
  $no_hp    = $_POST['no_hp'];
  $alamat   = $_POST['alamat'];

  $id_kamar     = $_POST['id_kamar'];
  $check_in     = $_POST['check_in'];
  $check_out    = $_POST['check_out'];
  $jumlah_kamar = $_POST['jumlah_kamar'];
  $tanggal_pesan = date('Y-m-d');

  if (empty($nama) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($id_kamar)) {
    die("Data tidak valid.");
  }

  $stmt_tamu = $conn->prepare("INSERT INTO tamu (nama_lengkap, email, no_hp, alamat) VALUES (?, ?, ?, ?)");
  $stmt_tamu->bind_param("ssss", $nama, $email, $no_hp, $alamat);
  $stmt_tamu->execute();
  $id_tamu = $stmt_tamu->insert_id;

  $stmt_reservasi = $conn->prepare("INSERT INTO reservasi (id_tamu, id_kamar, check_in, check_out, jumlah_kamar, tanggal_reservasi, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
  $stmt_reservasi->bind_param("iissis", $id_tamu, $id_kamar, $check_in, $check_out, $jumlah_kamar, $tanggal_pesan);
  $stmt_reservasi->execute();
  $id_reservasi = $stmt_reservasi->insert_id;

  ?>
  <div class="container py-5 text-center">
    <h2 class="mb-3">Reservasi Berhasil!</h2>
    <p>Terima kasih telah memesan di <strong>The Arlenmoor</strong>.</p>
    <p><strong>ID Reservasi:</strong> <?= $id_reservasi ?></p>
    <p>Status reservasi saat ini: <span class="badge bg-warning text-dark">Pending</span></p>
    <a href="index.php" class="btn btn-outline-primary mt-3">Kembali ke Beranda</a>

    <div class="text-center mt-4">
      <p>Sudah transfer? Upload bukti pembayaran:</p>
      <a href="upload-pembayaran.php?id=<?= $id_reservasi ?>" class="btn btn-outline-success">Upload Pembayaran</a>
    </div>
  </div>
  <?php

} else {
  header("Location: reservasi.php");
  exit;
}

include 'includes/footer.php';
?>
