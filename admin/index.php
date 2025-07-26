<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
include 'partials/head.php';
?>

<body>
<div class="admin-wrapper">

<?php include 'partials/navbar.php'; ?>

<main class="admin-content container py-5">
  <h2 class="mb-4">Dashboard Admin</h2>
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card border-start border-primary border-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Total Kamar</h5>
          <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kamar")) ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-success border-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Total Reservasi</h5>
          <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM reservasi")) ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-warning border-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Reservasi Pending</h5>
          <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM reservasi WHERE status='pending'")) ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-danger border-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Pembayaran Pending</h5>
          <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pembayaran WHERE status='menunggu'")) ?></h2>
        </div>
      </div>
    </div>
  </div>
</main>



</div>
</body>

<?php include 'partials/footer.php'; ?>