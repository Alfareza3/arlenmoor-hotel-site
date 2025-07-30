<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<style>
body {
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
              url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
  color: white;
}

.card-img-top {
  height: 220px;
  object-fit: cover;
  width: 100%;
}

.card {
  background-color: rgba(255, 255, 255, 0.08); /* transparan banget */
  border: 1px solid rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(6px); /* efek kaca */
  color: white;
  transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

.card-title, .card-text {
  color: white;
}

h2.text-white {
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
}

.container-kamar {
  background-color: rgba(0, 0, 0, 0.4); /* kontainer semi gelap */
  padding: 40px;
  border-radius: 15px;
}

  .mobile-nav a {
    text-decoration: none;
    flex: 1;
  }

  .mobile-nav a:hover {
    background: rgba(255,255,255,0.05);
  }
</style>

<div class="container py-5 container-kamar">
  <h2 class="mb-4 text-center text-white">Pilihan Kamar Kami</h2>
  <div class="row">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM kamar ORDER BY harga_per_malam DESC");
    while ($kamar = mysqli_fetch_assoc($query)) :
    ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/<?php echo $kamar['foto']; ?>" class="card-img-top" alt="Kamar <?php echo $kamar['nama_kamar']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $kamar['nama_kamar']; ?></h5>
            <p class="card-text">Rp <?php echo number_format($kamar['harga_per_malam']); ?> / malam</p>
            <a href="detail-kamar.php?id=<?php echo $kamar['id_kamar']; ?>" class="btn btn-outline-light">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<nav class="mobile-nav d-md-none bg-dark text-white d-flex justify-content-around py-2 fixed-bottom shadow-lg">
  <a href="index.php" class="text-white text-center small">
    <div>🏠</div><div>Beranda</div>
  </a>
  <a href="kamar.php" class="text-warning text-center small">
    <div>🛏️</div><div>Kamar</div>
  </a>
  <a href="reservasi.php" class="text-white text-center small">
    <div>📝</div><div>Pesan Kamar</div>
  </a>
  <a href="kontak.php" class="text-white text-center small">
    <div>📞</div><div>Kontak</div>
  </a>
  <a href="tentang.php" class="text-white text-center small">
    <div>📖</div><div>Tentang</div>
  </a>
</nav>

<?php include 'includes/footer.php'; ?>
