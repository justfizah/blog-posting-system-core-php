<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Why So Awesome?</title>

  <!-- CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin/assets/css/prism.css" rel="stylesheet">
  <link href="/assets/css/styles.css" rel="stylesheet">
</head>

<body>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Why So Awesome?</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
          </li>
          <?php if (!$session->is_signed_in()): ?>
              <li class="nav-item">
                <a class="nav-link" href="/admin">Login</a>
              </li>
          <?php else: ?>
              <li class="nav-item">
                  <a class="nav-link" href="/admin">Admin</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/admin/logout.php">Logout <?= $_SESSION['user_first_name']; ?></a>
              </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>