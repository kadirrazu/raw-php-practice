
<?php require( APP_PATH . "views/partials/header.view.php"); ?>

<?php require( APP_PATH . "views/partials/top-bar.view.php"); ?>
    
	
	<div class="container-fluid">
	  <div class="row">
		
      <?php require( APP_PATH . "views/partials/sidebar.view.php"); ?>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">
                <?php 
                   echo isset($view_parameter['page_title']) ? $view_parameter['page_title'] : "Administrator Dashboard";
                ?>
            </h1>
		  </div>

		  <div class="main-content">

            <?php require( APP_PATH . "views/".$url.".view.php"); ?>

          </div>

		</main>
	  </div>
	</div>


<?php require( APP_PATH . "views/partials/footer.view.php"); ?>