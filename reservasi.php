<?php
include 'koneksi.php';
include 'includes/head.php';
include 'includes/navbar.php';

$id_kamar = isset($_GET['id']) ? intval($_GET['id']) : 0;
$kamar = null;

if ($id_kamar) {
  $result = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = $id_kamar");
  $kamar = mysqli_fetch_assoc($result);
}
?>

<style>
.form-wrapper {
  background-color: rgba(0, 0, 0, 0.6); /* transparan gelap */
  color: white;
  padding: 40px;
  border-radius: 15px;
  backdrop-filter: blur(5px);
}

.form-wrapper label {
  color: #fff;
}

.form-wrapper .form-control {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: white;
}

.form-wrapper .form-control::placeholder {
  color: rgba(255, 255, 255, 0.6);
}

.form-wrapper .form-control:focus {
  background-color: rgba(255, 255, 255, 0.15);
  color: #fff;
}
</style>

<section style="
  background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
              url('assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
  min-height: 100vh;
  padding: 60px 0;
">
  <div class="container">
    <h2 class="mb-4 text-center text-white">Formulir Reservasi</h2>
    <form action="konfirmasi.php" method="POST" class="form-wrapper mx-auto shadow" style="max-width: 900px;">
      <input type="hidden" name="id_kamar" value="<?= $kamar ? $kamar['id_kamar'] : '' ?>">

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama lengkap">
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required placeholder="Alamat email aktif">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Nomor HP</label>
          <input type="text" name="no_hp" class="form-control" required placeholder="08xxxxxxxx">
        </div>
        <div class="col-md-6">
          <label class="form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control" required placeholder="Alamat lengkap">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Check-in</label>
          <input type="date" name="check_in" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Check-out</label>
          <input type="date" name="check_out" class="form-control" required>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-6">
          <label class="form-label">Jumlah Kamar</label>
          <input type="number" name="jumlah_kamar" min="1" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Pilih Kamar</label>
          <select name="id_kamar" class="form-control" required>
            <option value="">-- Pilih Kamar --</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM kamar");
            while ($row = mysqli_fetch_assoc($q)) {
              $selected = ($kamar && $kamar['id_kamar'] == $row['id_kamar']) ? 'selected' : '';
              echo "<option value='{$row['id_kamar']}' $selected>{$row['nama_kamar']}</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-light px-4">Kirim Reservasi</button>
      </div>
      <div class="text-center mt-3">
        <a href="index.php" class="btn btn-outline-light btn-sm">← Kembali ke Beranda</a>
      </div>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
