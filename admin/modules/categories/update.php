<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $category = Category::find_category_by_id($_GET['id']);
    if ($category && $category->user_id === $_SESSION['user_id'] || $category && User::find_role_by_id($_SESSION['user_id']) === 'Super User') {
        if (isset($_POST['update'])) {
            $category->name   = $_POST['category'];
            $category->update();
            $flash->set_message('success', $category->name . '\'s details has been updated in our database.');
            redirect('/admin/modules/categories');
        }
    } else {
        $flash->set_message('danger', 'This category not found in our database.');
        redirect('/admin/modules/categories');
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
                <a href="/admin/modules/categories">Categories</a>
            </li>
            <li class="breadcrumb-item active">Update Category</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Update Category</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <input class="form-control" type="text" name="category" value="<?= $category->name; ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary pull-right" type="submit" name="update" value="Update Category">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h4 class="text-center">Category List</h4>
                <table class="table table-hover" id="dataTable" data-page-length='4'>
                    <thead>
                        <th>Name</th>
                        <th class="sorting_asc_disabled sorting_desc_disabled"></th>
                    </thead>
                    <tbody>
                        <?php
                        if (User::find_role_by_id($_SESSION['user_id']) === 'Super User') {
                            $categories = Category::find_all_categories();
                        } else if (User::find_role_by_id($_SESSION['user_id']) === 'User') {
                            $categories = Category::find_all_categories_by_user_id($_SESSION['user_id']);
                        } else {
                            $categories = [];
                        }
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
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>