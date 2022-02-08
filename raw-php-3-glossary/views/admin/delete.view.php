
<div class="container">
    
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>

    <div class="row text-center">
        <form action="" method="POST">
            <div class="text-danger mb-3 mt-3">
                Are you sure, You want to delete the term: <strong>"<?= $data->term ?>"</strong> ?
            </div>
            <input type="hidden" name="delete-term" value="<?= $data->term ?>">
            <button type="submit" class="btn btn-primary">Yes, Delete</button>
            <a href="index.php" class="btn btn-info">Back</a>
        </form>
    </div>

</div>