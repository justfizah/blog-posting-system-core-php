<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $user = User::find_user_by_id($_GET['id']);
    if ($user) {
        if (isset($_POST['update'])) {
            $user->username   = $_POST['username'];
            if (isset($_POST['password']) && $_POST['password'] !== '') {
                $user->password   = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
            $user->first_name = $_POST['fname'];
            $user->last_name  = $_POST['lname'];
            $user->update();
            $flash->set_message('success', $user->first_name . '\'s details has been updated in our database.');
            redirect('/admin/modules/users');
        }
    } else {
        $flash->set_message('danger', 'This user not found in our database.');
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
      <li class="breadcrumb-item active">Update User</li>
    </ol>

    <!-- Content Area -->
    <div class="row">
      <div class="col-12">
        <h1>Update User</h1>
        <hr>
        <form action="" method="POST">
        	<div class="form-group">
	        	<label for="username">Username</label>
	        	<input type="text" name="username" class="form-control" value="<?= $user->username; ?>" required autofocus>
        	</div>
        	<div class="form-group">
	        	<label for="password">Password</label>
	        	<input type="text" name="password" class="form-control">
        	</div>
        	<div class="form-group">
	        	<label for="fname">First Name</label>
	        	<input type="text" name="fname" class="form-control" value="<?= $user->first_name; ?>" required>
        	</div>
        	<div class="form-group">
	        	<label for="lname">Last Name</label>
	        	<input type="text" name="lname" class="form-control" value="<?= $user->last_name; ?>" required>
        	</div>
        	<div class="form-group">
	        	<input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
        	</div>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>