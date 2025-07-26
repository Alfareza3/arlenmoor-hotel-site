<?php
session_start();
$admin_user = 'admin';
$admin_pass = 'arlen123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  if ($user === $admin_user && $pass === $admin_pass) {
    $_SESSION['admin'] = $user;
    header("Location: index.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card shadow p-4" style="width: 350px;">
    <h4 class="mb-3 text-center">Login Admin</h4>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Masuk</button>
    </form>
    <div class="mt-3 text-center">
        <a href="../index.php" class="btn btn-outline-secondary btn-sm">← Kembali ke Beranda</a>
    </div>
  </div>
</body>
</html>