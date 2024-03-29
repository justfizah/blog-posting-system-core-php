<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_POST['create'])) {
    $post = new Post;
    if ($post) {
        $post->user_id = $_SESSION['user_id'];
        $post->title = $_POST['title'];
        $post->category_id = $_POST['category_id'];
        $post->status = $_POST['status'];
        $post->image = $_FILES['image']['name'];
        $temp_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_path, $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/images/blogs/' . $post->image);
        $post->content = $_POST['content'];
        $post->tags = $_POST['tags'];
        $post->create();
        $flash->set_message('success', $post->title . ' has been added in our database.');
        redirect('/admin/modules/posts');
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
                <a href="/admin/modules/posts">Posts</a>
            </li>
            <li class="breadcrumb-item active">Create Post</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Create Post</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required autofocus>
                    </div>
                    <div class="form-group" id="reload_category">
                        <div class="row">
                            <div class="col-6">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <?php
                                    $categories = Category::find_all_categories_by_user_id($_SESSION['user_id']);
                                    foreach ($categories as $category):
                                        ?>
                                        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6" style="margin-top: 28px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">Add Category</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Draft">Draft</option>
                            <option value="Published">Published</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image (Recommended: 750x300 Pixels)</label><br>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="create" value="Create" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/admin/modules/categories/create.php" id="add_category_form">
                    <div class="form-group">
                        <label for="category"></label>
                        <input type="text" name="ajax_category" class="form-control" placeholder="Category Name" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>