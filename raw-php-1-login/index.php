<?php 
    session_start();

    include('inc/functions.php');

    if(isset($_SESSION['user_email'])){
        redirect('dashboard.php');
        die();
    }
?>
<?php include('./inc/header.php'); ?>

    <h1 class="visually-hidden">Hello World!</h1>

    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">A simple Demo of RAW PHP</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Please login with the system to proceed further.</p>
        </div>
    </div>

    <div class="b-example-divider"></div>

    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Log-in form</h1>
            <p class="col-lg-10 fs-4">Fill up this form to login with the system.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="inc/login-processor.php">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
                <hr class="my-4">
                <?php 
                    if(isset($_SESSION['temp_msg'])){
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['temp_msg'];
                        echo "</div>";
                        unset($_SESSION['temp_msg']);
                    }
                ?>
            </form>
            
        </div>
        </div>
    </div>


<?php include('./inc/footer.php'); ?>