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

        <table class="table table-responsive table-hover" id="dataTable">
            <thead>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Creation Date</th>
                <th>Updatation Date</th>
                <th class="sorting_asc_disabled sorting_desc_disabled"></th>
            </thead>
            <tbody>
            <?php
            $posts = Post::find_all_posts();
            foreach ($posts as $post):
            ?>
                <tr>
                    <td><?= $post->author; ?></td>
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
                    <td><?= $post->comments_count; ?></td>
                    <td><?= $post->created_at; ?></td>
                    <td><?= $post->updated_at; ?></td>
                    <td class="text-center">
                        <span><a href="/admin/modules/posts/update.php?id=<?= $post->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                        <span><a href="/admin/modules/posts/delete.php?id=<?= $post->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/partials/footer.php'); ?>