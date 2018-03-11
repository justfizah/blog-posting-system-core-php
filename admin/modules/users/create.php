<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_POST['create'])) {
    $user = new User;
    if ($user) {
        $user->username   = $_POST['username'];
        $user->password   = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->first_name = $_POST['fname'];
        $user->last_name  = $_POST['lname'];
        $user->create();
        $flash->set_message('success', $user->first_name . ' has been added in our database.');
        redirect('/admin/modules/users');
    }
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
      <li class="breadcrumb-item">
        <a href="/admin/modules/users">Users</a>
      </li>
      <li class="breadcrumb-item active">Create User</li>
    </ol>

    <!-- Content Area -->
    <div class="row">
      <div class="col-12">
        <h1>Create User</h1>
        <hr>
      </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="create" value="Create" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>