<div class="form-area">
    <form action="" method="POST">
        
    </form>
</div>

<div class="row  justify-content-left">
    <div class="col-5">

        <div class="text-danger">
            <p>Are you sure, want to delete "<strong><?= $model['title'] ?> (<?= $model['designation'] ?>)</strong>"</p>
        </div>
        
        <form action="" method="POST">
            <input type="hidden" class="hidden" name="id" value="<?= $model['id'] ?>">
            <br>
            <button type="submit" class="btn btn-primary">Delete</button>
            <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
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