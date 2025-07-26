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
  <h2 class="mb-4">Pesan Masuk</h2>

  <table class="table table-bordered table-hover">
    <thead class="table-dark text-center">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Waktu</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $query = mysqli_query($conn, "SELECT * FROM kontak ORDER BY waktu DESC");
      while ($row = mysqli_fetch_assoc($query)) :
      ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
          <td class="text-center"><?= date('d M Y H:i', strtotime($row['waktu'])) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include 'partials/footer.php'; ?>
