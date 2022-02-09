
<div class="container">
    
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
        <?php if(isset($view_data['isSearch']) && $view_data['isSearch'] == 1 && $view_data['queryString'] != "") : ?>
            <h5>Search Results for : <strong class="text-success"> <?= $view_data['queryString']?> </strong></h5>
        <?php endif;?>
    </div>

    <div class="row">
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
                            <a href="detail.php?term=<?= $terms->term ?>">
                                <?php echo strtoupper( $terms->term ); ?> 
                            </a>
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