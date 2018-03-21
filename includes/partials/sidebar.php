<div class="col-md-4">

  <!-- Side Widget -->
  <?php if (!$session->is_signed_in()): ?>
  <div class="card my-4">
      <h5 class="card-header">Login</h5>
      <div class="card-body">
          <form action="/admin/login.php" method="post">
              <div class="input-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="input-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                  <span class="input-group-btn">
                      <button class="btn btn-secondary" name="login" type="submit">Login</button>
                  </span>
              </div>
          </form>
      </div>
  </div>
  <?php endif; ?>

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
              <?php
              $categories = Category::find_all_categories();
              foreach ($categories as $key => $category):
                  if ($key%2 === 0):
                      ?>
                      <li>
                          <a href="#"><?= $category->name; ?></a>
                      </li>
                  <?php endif; ?>
              <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
              <?php
              $categories = Category::find_all_categories();
              foreach ($categories as $key => $category):
                  if ($key%2 !== 0):
                      ?>
                      <li>
                          <a href="#"><?= $category->name; ?></a>
                      </li>
                  <?php endif; ?>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
</div>