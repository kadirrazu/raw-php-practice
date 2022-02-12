<div class="form-area">
    <form action="" method="POST">
        
    </form>
</div>

<div class="row  justify-content-left">
    <div class="col-5">
        
        <form action="" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Name: </label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation: </label>
                <input type="text" name="designation" id="designation" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile: </label>
                <input type="text" name="mobile" id="mobile" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone: </label>
                <input type="text" name="telephone" id="telephone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
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