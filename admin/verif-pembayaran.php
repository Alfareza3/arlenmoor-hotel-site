<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
$aksi = $_GET['aksi'];

$status = ($aksi === 'terima') ? 'diterima' : 'ditolak';

mysqli_query($conn, "UPDATE pembayaran SET status='$status' WHERE id_pembayaran=$id");

header("Location: kelola-pembayaran.php");
exit;
?>
