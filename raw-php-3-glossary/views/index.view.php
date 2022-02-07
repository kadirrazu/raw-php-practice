
<div class="container">
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>
    <div class="row">
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
    </div>
</div>