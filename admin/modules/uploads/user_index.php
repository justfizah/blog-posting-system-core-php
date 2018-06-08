<!-- Checking Role For Restriction -->
<?php
if (User::find_role_by_id($_SESSION['user_id']) !== 'User') {
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
            <li class="breadcrumb-item active">Media</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>
                    Media
                    <a href="/admin/modules/uploads/create.php" class="btn btn-primary pull-right"><i class="fa fa-upload" aria-hidden="true"></i> Upload Media</a>
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

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Creation Date</th>
                <th>Updatation Date</th>
                <th class="sorting_asc_disabled sorting_desc_disabled" width="50px"></th>
                </thead>
                <tbody>
                <?php
                $uploads = Upload::find_all_uploads_by_user_id($_SESSION['user_id']);
                foreach ($uploads as $upload):
                    ?>
                    <tr>
                        <td>
                            <?php if ($upload->filename): ?>
                                <img class="img-thumbnail" src="/admin/assets/images/uploads/<?= $upload->filename; ?>" alt="<?= $upload->filename; ?>" width="100px">
                            <?php
                            else:
                                echo "Image Not Available!";
                            endif;
                            ?>
                        </td>
                        <td><?= $upload->title; ?></td>
                        <td><?= $upload->description; ?></td>
                        <td><?= $upload->created_at; ?></td>
                        <td><?= $upload->updated_at; ?></td>
                        <td class="text-center">
                            <span><a href="/admin/modules/uploads/update.php?id=<?= $upload->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                            <span><a href="/admin/modules/uploads/delete.php?id=<?= $upload->id; ?>" onclick="return confirm('Are you sure you want to delete this upload?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>