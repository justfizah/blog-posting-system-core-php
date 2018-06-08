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
            <li class="breadcrumb-item active">Posts</li>
        </ol>

        <!-- Content Area -->
        <div class="row">
            <div class="col-12">
                <h1>
                    Posts
                    <a href="/admin/modules/posts/create.php" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Post</a>
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
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th width="100px">Image</th>
                <th>Tags</th>
                <th>Creation Date</th>
                <th>Updatation Date</th>
                <th class="sorting_asc_disabled sorting_desc_disabled" width="50px"></th>
                </thead>
                <tbody>
                <?php
                $posts = Post::find_all_posts();
                foreach ($posts as $post):
                    ?>
                    <tr>
                        <td><?= $post->title; ?></td>
                        <td><?= $post->find_category_name(); ?></td>
                        <td><?= $post->status; ?></td>
                        <td>
                            <?php if ($post->image): ?>
                                <img class="img-thumbnail" src="/admin/assets/images/blogs/<?= $post->image; ?>" alt="<?= $post->image; ?>">
                            <?php
                            else:
                                echo "Image Not Available!";
                            endif;
                            ?>
                        </td>
                        <td><?= $post->tags; ?></td>
                        <td><?= $post->created_at; ?></td>
                        <td><?= $post->updated_at; ?></td>
                        <td class="text-center">
                            <span><a href="/post.php?id=<?= $post->id; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                            <span><a href="/admin/modules/posts/update.php?id=<?= $post->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                            <span><a href="/admin/modules/posts/delete.php?id=<?= $post->id; ?>" onclick="return confirm('Are you sure you want to delete this post?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>