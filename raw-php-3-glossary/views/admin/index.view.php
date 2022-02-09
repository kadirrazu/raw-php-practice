
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

    
    <?php if(if_flash_msg()) : ?>
        <div class="text-success text-center mt-3">
            <strong>
            <?php 
                echo get_flash_msg(); 
                delete_flash_msg(); 
            ?>
            </strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <h5>Existing Terms: </h5>
        <?php if(count($data) > 0) : ?>
            <?php 
                usort($data, function ($a, $b) {
                    return $a->term <=> $b->term;
                });    
            ?>

            <div class="text-info text-center">
                <h6>Total Terms: <?php echo count($data); ?> </65> 
            </div>
            
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