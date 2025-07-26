<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
include 'partials/head.php';
include 'partials/navbar.php';

function safe($val) {
  return htmlspecialchars($val ?? '');
}
?>

<div class="container py-5">
  <h2 class="mb-4">Kelola Pembayaran</h2>

  <table class="table table-bordered table-hover">
    <thead class="table-dark text-center">
      <tr>
        <th>No</th>
        <th>ID Reservasi</th>
        <th>Nama Tamu</th>
        <th>Bukti Transfer</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $sql = "SELECT p.*, r.id_reservasi, t.nama_lengkap 
              FROM pembayaran p
              JOIN reservasi r ON p.id_reservasi = r.id_reservasi
              JOIN tamu t ON r.id_tamu = t.id_tamu
              ORDER BY p.tanggal_bayar DESC";
      $data = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($data)) :
        $badge = match($row['status']) {
          'diterima' => 'success',
          'ditolak' => 'danger',
          default => 'warning'
        };
      ?>
        <tr class="text-center">
          <td><?= $no++ ?></td>
          <td>#<?= safe($row['id_reservasi']) ?></td>
          <td><?= safe($row['nama_lengkap']) ?></td>
          <td>
            <?php if (!empty($row['bukti_bayar'])): ?>
              <a href="../assets/img/<?= safe($row['bukti_bayar']) ?>" target="_blank">Lihat</a>
            <?php else: ?>
              <em>Tidak ada</em>
            <?php endif; ?>
          </td>
          <td><span class="badge bg-<?= $badge ?>"><?= ucfirst($row['status']) ?></span></td>
          <td><?= date('d M Y H:i', strtotime($row['tanggal_bayar'])) ?></td>
          <td>
            <?php if ($row['status'] == 'menunggu_verifikasi') : ?>
              <a href="verif-pembayaran.php?id=<?= $row['id_pembayaran'] ?>&aksi=terima" class="btn btn-sm btn-success mb-1">Terima</a>
              <a href="verif-pembayaran.php?id=<?= $row['id_pembayaran'] ?>&aksi=tolak" class="btn btn-sm btn-danger">Tolak</a>
            <?php else : ?>
              <em>Terverifikasi</em>
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include 'partials/footer.php'; ?>
