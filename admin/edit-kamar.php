<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
include 'partials/head.php';
include 'partials/navbar.php';

$id = $_GET['id'];
$kamar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama      = $_POST['nama_kamar'];
  $harga     = $_POST['harga_per_malam'];
  $deskripsi = $_POST['deskripsi'];
  $fasilitas = $_POST['fasilitas'];

  if ($_FILES['foto']['name'] != '') {
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/" . $foto);
    $query = "UPDATE kamar SET nama_kamar='$nama', harga_per_malam='$harga', deskripsi='$deskripsi', fasilitas='$fasilitas', foto='$foto' WHERE id_kamar=$id";
  } else {
    $query = "UPDATE kamar SET nama_kamar='$nama', harga_per_malam='$harga', deskripsi='$deskripsi', fasilitas='$fasilitas' WHERE id_kamar=$id";
  }

  mysqli_query($conn, $query);
  header("Location: kelola-kamar.php");
}
?>

<div class="container py-5">
  <h2 class="mb-4">Edit Kamar</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Kamar</label>
      <input type="text" name="nama_kamar" value="<?= $kamar['nama_kamar'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Harga per Malam</label>
      <input type="number" name="harga_per_malam" value="<?= $kamar['harga_per_malam'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"><?= $kamar['deskripsi'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Fasilitas</label>
      <textarea name="fasilitas" class="form-control" rows="3"><?= $kamar['fasilitas'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Foto Kamar (opsional)</label>
      <input type="file" name="foto" class="form-control">
      <small>Foto lama: <?= $kamar['foto'] ?></small>
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
    <a href="kelola-kamar.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<?php include 'partials/footer.php'; ?>
