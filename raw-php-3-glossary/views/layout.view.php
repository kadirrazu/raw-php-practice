<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page - <?= $view_data['title']; ?></title>   

    <!-- Bootstrap core CSS -->
    <link href="/raw-php-practice/assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <?php if(isset($view_data['navbar']) && $view_data['navbar'] === true): ?>

  <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
            <!--<li><a href="#" class="nav-link px-2 text-white">Features</a></li>-->
          </ul>

          <?php if(!is_logged_in()): ?>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="index.php" method="GET">
              <input type="search" name="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
          <?php endif; ?>
          
          <div class="text-end">
            <?php if(!is_logged_in()): ?>
              <a href="admin/login.php" class="btn btn-outline-light me-2">Login</a>
            <?php else: ?>
              <a href="logout.php" class="btn btn-outline-light me-2">Logout</a>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </header>

    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="pt-5 text-center">
                <h1 class="display-5 fw-bold">A Demo of RAW PHP</h1>
                <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4">- Glossary Application -</p>
                </div>
                <hr>
            </div>
        </div>
    </div>
      
    <?php require("$page.view.php") ?>

    <div class="container">
        <div class="row">
            <div class="text-center pt-3">
              <hr>
            </div>
            <div class="text-center">
              Copyright @Nothing <?php echo date('Y'); ?>
            </div>
        </div>
    </div>

  </body>
</html>
    
