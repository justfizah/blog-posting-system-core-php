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
      <li class="breadcrumb-item active">Users</li>
    </ol>

    <!-- Content Area -->
    <div class="row">
      <div class="col-12">
        <h1>
          Users
          <a href="/admin/modules/users/create.php" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create User</a>
        </h1>
        <hr>
      </div>
    </div>

    <?php if ($flash->message('success')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $flash->message('success'); ?>
      </div>
    <?php endif; ?>

    <?php if ($flash->message('danger')): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $flash->message('danger'); ?>
      </div>
    <?php endif; ?>
    
    <table class="table table-hover" id="dataTable">
      <thead>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Creation Date</th>
        <th>Updatation Date</th>
        <th class="sorting_asc_disabled sorting_desc_disabled"></th>
      </thead>
      <tbody>
        <?php
        $users = User::find_all_users();
        foreach ($users as $user):
        ?>
        <tr>
          <td><?= $user->username; ?></td>
          <td><?= $user->first_name; ?></td>
          <td><?= $user->last_name; ?></td>
          <td><?= $user->created_at; ?></td>
          <td><?= $user->updated_at; ?></td>
          <td class="text-center">
            <span><a href="/admin/modules/users/update.php?id=<?= $user->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
            <span><a href="/admin/modules/users/delete.php?id=<?= $user->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>