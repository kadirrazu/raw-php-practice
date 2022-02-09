
<div class="container">
    
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>

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
            <?php if(if_flash_msg()) : ?>
                <div class="text-danger text-center mt-3">
                    <strong>
                    <?php 
                        echo get_flash_msg(); 
                        delete_flash_msg(); 
                    ?>
                    </strong>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>