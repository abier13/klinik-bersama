<?php
require_once '../_config/config.php';
require_once '../_config/jikalogin.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Login - Klinik Bersama</title>
  <link rel="icon" href="<?= base_url() ?>/_assets/images/logo.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>/_assets/css/bootstrap5.css" rel="stylesheet">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="<?= base_url() ?>/_assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <?php if (isset($_SESSION['notif'])) {    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Gagal!</strong> <?= $_SESSION['notif']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION['notif']);
    } ?>
    <form action="proses_login.php" method="post">
      <img class="mb-4" src="<?= base_url() ?>/_assets/images/logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

      <div class="form-floating">
        <input type="username" name="username" class="form-control" id="floatingInput" placeholder="Username" required autofocus>
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; Copyright Klinik Bersama - <?= date('Y'); ?></p>
    </form>
  </main>
</body>

<script src="<?= base_url() ?>/_assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/_assets/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 4000);
  });
</script>

</html>