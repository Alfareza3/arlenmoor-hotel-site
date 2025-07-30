<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - The Arlenmoor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: url('../assets/img/admin-bg.jpg') center/cover no-repeat fixed;
      font-family: 'Lora', serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .admin-wrapper {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .admin-content {
      background-color: rgba(255, 255, 255, 0.96);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      margin-top: 40px;
    }

    .admin-content h2 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      text-align: center;
      margin-bottom: 2rem;
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    footer {
      background-color: #1a1a1a;
      color: #fff;
      padding: 1rem 0;
      text-align: center;
      margin-top: auto;
    }
  </style>
</head>

<body>
<div class="admin-wrapper">
  <?php include 'partials/navbar.php'; ?>

  <main class="container admin-content">
    <h2>Dashboard Admin</h2>
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

  <footer>
    <p class="mb-0">&copy; <?= date('Y') ?> The Arlenmoor - Admin Panel</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
