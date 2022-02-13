<?php

session_start();

require('app/app.php');

//If user is already logged in - redirect him to his dashboard
if(is_logged_in()){
    redirect('dashboard');
}

//Perform a authentication task, if $email and $password are provided via POST
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    //Sanitize post data first
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    //If $email or $password got empty, then return with an error message
    if(empty($email) || empty($password)){
        set_flash_msg("You shall not left email or password as empty.");
    }
    else{
        
        //Perform authentication task
        $authenticate = authenticate($email, $password);

        //If authentication passes, then redirect to administrator dashboard
        //Otherwise, return with a mismatch message
        if($authenticate === true){

            set_flash_msg("Authenticaton was successfull.");
            redirect('dashboard');
            die();
            
        }
        else{
            set_flash_msg("Email or Password does not matched.");
        }
    }

}

//Load the view
//By setting $template = false will not load the layout.view.php file
view('login', false);