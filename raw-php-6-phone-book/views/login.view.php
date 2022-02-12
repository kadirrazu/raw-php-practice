
<?php require( APP_PATH . "views/partials/header.view.php"); ?>
    
	
	<div class="container">

        <div class="row text-center">
            <h2>Login</h2>
        </div>

        <hr>

        <div class="row  justify-content-center">
            <div class="col-4">
                
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <div class="mt-3 text-strong">
                    <?php if(if_flash_msg()) : ?>

                        <p class="text-danger">
                            <strong><?php echo get_flash_msg(); ?></strong>
                        </p>

                    <?php endif; delete_flash_msg(); ?>
                </div>

            </div>
        </div>

	</div>


<?php require( APP_PATH . "views/partials/footer.view.php"); ?>