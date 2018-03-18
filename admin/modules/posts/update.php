<!-- Header -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $post = Post::find_post_by_id($_GET['id']);
    if ($post) {
        if (isset($_POST['update'])) {
            $post->title = $_POST['title'];
            $post->category_id = $_POST['category_id'];
            $post->status = $_POST['status'];
            if ($_FILES['image']['name'] !== '' && $_FILES['image']['tmp_name'] !== '') {
                $post->image = $_FILES['image']['name'];
                $temp_path = $_FILES['image']['tmp_name'];
                move_uploaded_file($temp_path, $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/images/blogs/' . $post->image);
            }
            $post->content = $_POST['content'];
            $post->tags = $_POST['tags'];
            $post->update();
            $flash->set_message('success', $post->title . ' has been updated in our database.');
            redirect('/admin/modules/posts');
        }
    }  else {
        $flash->set_message('danger', 'This post not found in our database.');
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
            <li class="breadcrumb-item active">Update Post</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>Update Post</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?= $post->title; ?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control" required>
                            <?php
                            $categories = Category::find_all_categories();
                            foreach ($categories as $category):
                            ?>
                                <?php if ($post->category_id === $category->id): ?>
                                    <option value="<?= $category->id; ?>" selected="selected"><?= $category->name; ?></option>
                                <?php else: ?>
                                    <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" value="<?= $post->status; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image (Recommended: 750x300 Pixels)</label><br>
                        <img class="img-thumbnail" src="/admin/assets/images/blogs/<?= $post->image; ?>" alt="<?= $post->image ?>" width="100px">
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="5"><?= $post->content; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" class="form-control" value="<?= $post->tags; ?>" required>
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