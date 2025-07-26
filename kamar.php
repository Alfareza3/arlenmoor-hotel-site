<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Pilihan Kamar Kami</h2>
  <div class="row">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM kamar ORDER BY harga_per_malam DESC");
    while ($kamar = mysqli_fetch_assoc($query)) :
    ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/<?php echo $kamar['foto']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $kamar['nama_kamar']; ?></h5>
            <p class="card-text text-muted">Rp <?php echo number_format($kamar['harga_per_malam']); ?> / malam</p>
            <a href="detail-kamar.php?id=<?php echo $kamar['id_kamar']; ?>" class="btn btn-primary">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
