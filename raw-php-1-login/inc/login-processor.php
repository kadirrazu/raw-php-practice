<?php session_start(); ?>
<?php include('data.php'); ?>
<?php include('functions.php'); ?>
<?php

if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if($email == "kadirrazu@github.com" && $password == "123456"){
        $_SESSION['user_email'] = $email;
        $_SESSION['temp_msg'] = "Login Succesful.";
        redirect("../dashboard.php");
        die();
    }
    else{
        $_SESSION['temp_msg'] = "Email and Password does not matched! Try again.";
        redirect("../index.php");
        die();
    }
}
else{
    die();
}