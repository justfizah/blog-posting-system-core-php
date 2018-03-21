<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/header.php'); ?>

<!-- Main Content -->
<div class="container">
  <?php if(!isset($_SESSION['user_id'])): ?>
      <div class="jumbotron text-center">
        <h1 class="display-6">Eleanor Roosevelt</h1>
        <p class="lead">"Learn from the mistakes of others. You can't live long enough to make them all yourself."</p>
      </div>
  <?php endif; ?>
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
        <img class="card-img-top" src="/admin/assets/images/blogs/<?= $post->image; ?>" alt="<?= $post->image; ?>" width="750px" height="300px">
        <div class="card-body">
          <h2 class="card-title"><?= $post->title; ?></h2>
          <p class="card-text" align="justify"><?= substr($post->content, 0, 255) . ' .....'; ?></p>
          <a href="post.php?id=<?= $post->id; ?>" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on <?= $post->created_at; ?> by
          <a href="#"><?= $post->find_author_name(); ?></a>
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