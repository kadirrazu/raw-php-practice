<?php 
    session_start(); 

    include('inc/functions.php');
    
    if(!isset($_SESSION['user_email'])){
        redirect("index.php");
    }
?>

<?php include('./inc/header-db.php'); ?>

    <div class="b-example-divider"></div>

    <?php if(isset($_SESSION['temp_msg'])){ ?>

        <div class="container">
            <div class="row">
            <?php
                echo '<div class="alert alert-danger" role="alert">';
                echo $_SESSION['temp_msg'];
                echo "</div>";
                unset($_SESSION['temp_msg']);
            ?>
            </div>

        </div>

    <?php } ?>

    <div class="container">
        <div class="row">
            <hr>
            <h3><?php echo "Welcome, " . $_SESSION['user_email']; ?></h3>
        </div>
    </div>

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
        <div class="col-lg-12 text-center">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

            <h2>Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->


<?php include('./inc/footer.php'); ?>