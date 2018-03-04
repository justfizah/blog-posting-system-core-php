<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/header.php'); ?>

<!-- Main Content -->
<div class="container">
  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h2 class="my-4 text-center">
        Latest Posts
      </h2>

      <!-- Blog Post -->
      <?php
      $posts = Post::find_all_posts();
      foreach ($posts as $post):
      ?>
      <div class="card mb-4">
        <img class="card-img-top" src="/admin/assets/images/blogs/<?= $post->image; ?>" alt="<?= $post->image; ?>">
        <div class="card-body">
          <h2 class="card-title"><?= $post->title; ?></h2>
          <p class="card-text" align="justify"><?= substr($post->content, 0, 255) . ' .....'; ?></p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on <?= $post->created_at; ?> by
          <a href="#"><?= $post->author; ?></a>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>
    </div>

    <!-- Sidebar Widgets Column -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/sidebar.php'); ?>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/footer.php'); ?>