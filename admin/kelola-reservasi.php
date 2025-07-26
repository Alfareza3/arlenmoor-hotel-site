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
  <h2 class="mb-4">Daftar Reservasi</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama Tamu</th>
        <th>Kamar</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $sql = "SELECT r.*, t.nama_lengkap, k.nama_kamar 
              FROM reservasi r 
              JOIN tamu t ON r.id_tamu = t.id_tamu 
              JOIN kamar k ON r.id_kamar = k.id_kamar
              ORDER BY r.tanggal_reservasi DESC";
      $data = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($data)) :
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama_lengkap'] ?></td>
          <td><?= $row['nama_kamar'] ?></td>
          <td><?= $row['check_in'] ?></td>
          <td><?= $row['check_out'] ?></td>
          <td><?= $row['jumlah_kamar'] ?></td>
          <td>
            <?php
            $badge = match($row['status']) {
              'confirmed' => 'success',
              'pending' => 'warning',
              'canceled' => 'danger',
              default => 'secondary'
            };
            ?>
            <span class="badge bg-<?= $badge ?>"><?= ucfirst($row['status']) ?></span>
          </td>
          <td>
            <a href="verif-reservasi.php?id=<?= $row['id_reservasi'] ?>&aksi=confirm" class="btn btn-sm btn-success">Konfirmasi</a>
            <a href="verif-reservasi.php?id=<?= $row['id_reservasi'] ?>&aksi=cancel" class="btn btn-sm btn-danger">Batalkan</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include 'partials/footer.php'; ?>
