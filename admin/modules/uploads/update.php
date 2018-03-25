<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $upload = Upload::find_upload_by_id($_GET['id']);
    if ($upload && $upload->user_id === $_SESSION['user_id'] || $upload && User::find_role_by_id($_SESSION['user_id']) === 'Super User') {
        if (isset($_POST['update'])) {
            $upload->title = $_POST['title'];
            $upload->description = $_POST['description'];
            $upload->update();
            $flash->set_message('success', $upload->title . ' has been updated in our database.');
            redirect('/admin/modules/uploads');
        }
    }  else {
        $flash->set_message('danger', 'This image not found in our database.');
        redirect('/admin/modules/uploads');
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
                <a href="/admin/modules/uploads">Media</a>
            </li>
            <li class="breadcrumb-item active">Update Media</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Update Media</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <img class="img-thumbnail" src="/admin/assets/images/uploads/<?= $upload->filename; ?>">
            </div>
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?= $upload->title; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"><?= $upload->description; ?></textarea>
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