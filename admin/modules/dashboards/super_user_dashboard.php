<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<!-- Checking Role For Restriction -->
<?php
if (User::find_role_by_id($_SESSION['user_id']) !== 'Super User') {
    redirect('/admin');
    exit;
}
?>

<!-- Main Content -->
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">My Dashboard</li>
    </ol>

    <!-- Icon Cards -->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-users"></i>
            </div>
            <div class="mr-5"><?= User::total_number_of_users(); ?> Users!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-list"></i>
            </div>
            <div class="mr-5"><?= Category::total_number_of_categories(); ?> Categories!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-list-alt"></i>
            </div>
            <div class="mr-5"><?= Post::total_number_of_posts(); ?> Posts!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-comments"></i>
            </div>
            <div class="mr-5"><?= 0; ?> Comments!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>