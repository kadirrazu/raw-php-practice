<?php

session_start();

require("../app/app.php");

//Pack a view_data array with TEXT parameters
set_page_title("Administrator Login");

$view_data['navbar'] = false;

view("admin/login");

if( is_post() ){
    if(empty($_POST['email']) || empty($_POST['password'])){
        //Go back to login page and show an error
        set_flash_msg("Please input email and password correctly.");
        set_page_title("Administrator Login");
        redirect("login");
    }
    else{
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        $matched = 0;

        foreach(CONFIG['users'] as $useremail => $userpassword){
            if( $useremail == $email && $userpassword == $password ){
                $matched = 1;
                $_SESSION['user_email'] = $useremail;
            }
        }

        if($matched === 0){
            set_flash_msg("Username or password does not matched.");
            set_page_title("Administrator Login");
            redirect("login");
        }
        else{
            set_flash_msg("Administrator authentication was successfull.");
            redirect("dashboard");
        }
        
    }
}