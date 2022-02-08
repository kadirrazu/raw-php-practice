
<div class="container">
    
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a href="create.php" class="btn btn-primary mb-3">Create a Term</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <h5>Existing Terms: </h5>
        <?php if(count($data) > 0) : ?>
            <table class="table table-striped">
                <?php foreach($data as $terms) : ?>
                    <tr>
                        <td> 
                            <a href="edit.php?key=<?= $terms->term ?>">
                                Edit 
                            </a> &nbsp;
                            <a href="delete.php?key=<?= $terms->term ?>">
                                Delete 
                            </a>
                        </td> 
                         <td>
                            <?php echo strtoupper( $terms->term ); ?> 
                        </td>
                        <td> <?php echo $terms->defination; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p class="text-danger">No result found.</p>
        <?php endif; ?>
    </div>
</div>