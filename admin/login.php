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
  <title>Login Admin - The Arlenmoor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Lora&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                  url('../assets/img/hero3-bg.jpg') center/cover no-repeat fixed;
      font-family: 'Lora', serif;
      min-height: 100vh;
    }

    .login-card {
      background-color: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 2rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
      color: white;
    }

    h4 {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
    }

    .form-control {
      background-color: rgba(255,255,255,0.85);
      border: none;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.5);
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center">

  <div class="login-card">
    <h4 class="mb-4 text-center">🔐 Login Admin</h4>
    
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

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

    <div class="text-center mt-3">
      <a href="../index.php" class="btn btn-outline-light btn-sm">← Kembali ke Beranda</a>
    </div>
  </div>

</body>
</html>
