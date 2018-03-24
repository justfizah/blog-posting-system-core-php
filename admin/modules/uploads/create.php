<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_POST['upload'])) {
    $upload = new Upload;
    if ($upload) {
        $upload->title = $_POST['title'];
        $upload->description = $_POST['description'];
        $upload->filename = $_FILES['image']['name'];
        $temp_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_path, $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/images/uploads/' . $upload->filename);
        $upload->type = $_FILES['image']['type'];
        $upload->size = round($_FILES['image']['size']/1048576, 2) . ' MB';
        $upload->create();
        $flash->set_message('success', $upload->title . ' has been uploaded in our database.');
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
            <li class="breadcrumb-item active">Upload Media</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Upload Media</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <input type="file" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" value="Upload" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>