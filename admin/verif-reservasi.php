<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id   = (int) $_GET['id'];
$aksi = $_GET['aksi'] ?? '';

if ($aksi === 'confirm') {
  // Ganti 'confirmed' → 'dibayar'
  mysqli_query($conn, "UPDATE reservasi SET status='dibayar' WHERE id_reservasi=$id");
} elseif ($aksi === 'cancel') {
  // Ganti 'canceled' → 'dibatalkan'
  mysqli_query($conn, "UPDATE reservasi SET status='dibatalkan' WHERE id_reservasi=$id");
}

header("Location: kelola-reservasi.php");
exit;
?>
