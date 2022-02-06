<?php include('inc/functions.php'); ?>

<?php 

    session_start();
    session_unset();
    session_destroy();

    redirect("index.php");

