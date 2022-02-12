<?php

session_start();

require('app/app.php');

if(is_logged_in()){
    redirect('dashboard');
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    if(empty($email) || empty($password)){
        set_flash_msg("You shall not left email or password as empty.");
    }
    else{
        
        $authenticate = authenticate($email, $password);

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

view('login', $template = false);