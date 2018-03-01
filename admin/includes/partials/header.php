<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<?php
if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Why So Awesome? - Admin</title>

  <!-- CSS -->
  <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/admin/assets/css/sb-admin.css" rel="stylesheet">
  <link href="/admin/assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/admin">Why So Awesome? - Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/admin">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="/admin/modules/users">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories">
          <a class="nav-link" href="/admin/modules/categories">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Categories</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Posts">
          <a class="nav-link" href="/admin/modules/posts">
              <i class="fa fa-fw fa-newspaper-o"></i>
              <span class="nav-link-text">Posts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Comments">
          <a class="nav-link" href="/admin/modules/comments">
              <i class="fa fa-fw fa-comments"></i>
              <span class="nav-link-text">Comments</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/" target="_blank">
            <i class="fa fa-fw fa-home"></i>View Site
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout <?= $session->user_first_name; ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>