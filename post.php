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
        <a href="#"><?= $post->author; ?></a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on <?= $post->created_at; ?></p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="<?= '/admin/assets/images/blogs/'. $post->image; ?>" alt="<?= $post->title; ?>" width="900px" height="300px">

      <hr>

      <!-- Post Content -->
      <div style="text-align: justify;"><?= $post->content; ?></div>

      <hr>

      <!-- Comments Form -->
<!--      <div class="card my-4">-->
<!--        <h5 class="card-header">Leave a Comment:</h5>-->
<!--        <div class="card-body">-->
<!--          <form>-->
<!--            <div class="form-group">-->
<!--              <textarea class="form-control" rows="3"></textarea>-->
<!--            </div>-->
<!--            <button type="submit" class="btn btn-primary">Submit</button>-->
<!--          </form>-->
<!--        </div>-->
<!--      </div>-->

      <!-- Single Comment -->
<!--      <div class="media mb-4">-->
<!--        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">-->
<!--        <div class="media-body">-->
<!--          <h5 class="mt-0">Commenter Name</h5>-->
<!--          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--        </div>-->
<!--      </div>-->

      <!-- Comment with nested comments -->
<!--      <div class="media mb-4">-->
<!--        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">-->
<!--        <div class="media-body">-->
<!--          <h5 class="mt-0">Commenter Name</h5>-->
<!--          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!---->
<!--          <div class="media mt-4">-->
<!--            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">-->
<!--            <div class="media-body">-->
<!--              <h5 class="mt-0">Commenter Name</h5>-->
<!--              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="media mt-4">-->
<!--            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">-->
<!--            <div class="media-body">-->
<!--              <h5 class="mt-0">Commenter Name</h5>-->
<!--              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->

    </div>

    <!-- Sidebar Widgets Column -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/sidebar.php'); ?>

  </div>
</div>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/partials/footer.php'); ?>