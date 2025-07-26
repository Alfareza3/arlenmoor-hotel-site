<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
include 'partials/head.php';
include 'partials/navbar.php';
?>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Kamar</h2>
    <a href="tambah-kamar.php" class="btn btn-success">+ Tambah Kamar</a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama Kamar</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = mysqli_query($conn, "SELECT * FROM kamar");
      while ($row = mysqli_fetch_assoc($data)) :
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><img src="../assets/img/<?= $row['foto'] ?>" width="100" height="70" style="object-fit:cover;"></td>
          <td><?= $row['nama_kamar'] ?></td>
          <td>Rp <?= number_format($row['harga_per_malam']) ?></td>
          <td>
            <a href="edit-kamar.php?id=<?= $row['id_kamar'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="hapus-kamar.php?id=<?= $row['id_kamar'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include 'partials/footer.php'; ?>
