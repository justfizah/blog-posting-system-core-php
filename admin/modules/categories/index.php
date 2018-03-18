<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<!-- Main Content -->
<div class="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Categories</h1>
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

        <div class="row">
            <div class="col-6">
                <h4 class="text-center">Add Category</h4>
                <form action="/admin/modules/categories/create.php" method="POST">
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <input class="form-control" type="text" name="category">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary pull-right" type="submit" name="create" value="Add Category">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h4 class="text-center">Category List</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" data-page-length='4'>
                        <thead>
                            <th>Name</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled"></th>
                        </thead>
                        <tbody>
                        <?php
                        $categories = Category::find_all_categories();
                        foreach ($categories as $category) :
                            ?>
                            <tr>
                                <td><?= $category->name; ?></td>
                                <td class="text-center">
                                    <span><a href="/admin/modules/categories/update.php?id=<?= $category->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                    <span><a href="/admin/modules/categories/delete.php?id=<?= $category->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">

            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>