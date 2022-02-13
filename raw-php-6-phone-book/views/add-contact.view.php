<div class="form-area">
    <form action="" method="POST">
        
    </form>
</div>

<div class="row  justify-content-left">
    <div class="col-5">

        <?php if(if_flash_msg()) : ?>
        <div class="mt-3 mb-3 text-strong">
            <p class="text-danger">
                <strong><?php echo get_flash_msg(); ?></strong>
            </p>
        </div>
        <?php endif; delete_flash_msg(); ?>
        
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

    </div>
</div>