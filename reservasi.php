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

<div class="container py-5">
  <h2 class="mb-4 text-center">Formulir Reservasi</h2>
  <form action="konfirmasi.php" method="POST">
    <input type="hidden" name="id_kamar" value="<?php echo $kamar ? $kamar['id_kamar'] : ''; ?>">

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Nomor HP</label>
        <input type="text" name="no_hp" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
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

    <div class="row mb-3">
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
      <button type="submit" class="btn btn-primary">Kirim Reservasi</button>
    </div>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
