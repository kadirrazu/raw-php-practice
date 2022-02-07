<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page - <?= $view_data['title']; ?></title>   

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          </ul>

          <div class="text-end">
            <button type="button" class="btn btn-outline-light me-2">Login</button>
          </div>
        </div>
      </div>
    </header>

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
    
