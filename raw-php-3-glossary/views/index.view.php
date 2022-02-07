<div class="container">
    <div class="row">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">A Demo of RAW PHP</h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">- Glossary Application -</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <h3><?= $view_data['title']; ?></h3>
    </div>
    <div class="row">
        <table class="table table-striped">
            <?php foreach($data as $terms) : ?>
                <tr>
                    <td> <?php echo strtoupper( $terms->term ); ?> </td>
                    <td> <?php echo $terms->defination; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>