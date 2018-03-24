<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/header.php'); ?>

<?php
if (isset($_GET['id']) && strlen($_GET['id'] !== 0)) {
    $post = Post::find_post_by_id($_GET['id']);
    if ($post) {

    } else {
        redirect('/');
    }
} else {
    redirect('/');
}
?>

<!-- Page Content -->
<div class="container">
  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4"><?= $post->title; ?></h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#"><?= $post->find_author_name(); ?></a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on <?= $post->created_at; ?></p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="<?= '/admin/assets/images/blogs/'. $post->image; ?>" alt="<?= $post->title; ?>" width="900px">

      <hr>

      <!-- Post Content -->
      <div style="text-align: justify;"><?= $post->content; ?></div>

      <hr>

    </div>

    <!-- Sidebar Widgets Column -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/sidebar.php'); ?>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/footer.php'); ?>