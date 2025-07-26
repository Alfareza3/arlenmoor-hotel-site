<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
include 'partials/head.php';
include 'partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama     = $_POST['nama_kamar'];
  $harga    = $_POST['harga_per_malam'];
  $deskripsi= $_POST['deskripsi'];
  $fasilitas= $_POST['fasilitas'];

  // upload file
  $foto = $_FILES['foto']['name'];
  $tmp  = $_FILES['foto']['tmp_name'];
  move_uploaded_file($tmp, "../assets/img/" . $foto);

  mysqli_query($conn, "INSERT INTO kamar (nama_kamar, harga_per_malam, deskripsi, fasilitas, foto)
                       VALUES ('$nama', '$harga', '$deskripsi', '$fasilitas', '$foto')");
  header("Location: kelola-kamar.php");
}
?>

<div class="container py-5">
  <h2 class="mb-4">Tambah Kamar</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Kamar</label>
      <input type="text" name="nama_kamar" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Harga per Malam</label>
      <input type="number" name="harga_per_malam" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
      <label>Fasilitas</label>
      <textarea name="fasilitas" class="form-control" rows="3" placeholder="Pisahkan dengan koma"></textarea>
    </div>
    <div class="mb-3">
      <label>Foto Kamar</label>
      <input type="file" name="foto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="kelola-kamar.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
