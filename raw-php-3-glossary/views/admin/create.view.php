
<div class="container">
    
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>

    <div class="row">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="term" class="form-label">Email address</label>
                <input type="text" class="form-control" id="term" name="term">
            </div>
            <div class="mb-3">
                <label for="defination" class="form-label">Password</label>
                <textarea class="form-control" id="defination" name="defination"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Term</button>
            <a href="index.php" class="btn btn-info">Back</a>
        </form>
    </div>
</div>