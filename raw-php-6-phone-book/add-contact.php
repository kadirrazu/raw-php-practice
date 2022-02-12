<?php

session_start();

require('app/app.php');

if(!is_logged_in()){
    redirect('index');
}

$view_parameter['page_title'] = "Add a new contact";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = sanitize($_POST['title']);
    $designation = sanitize($_POST['designation']);
    $mobile = sanitize($_POST['mobile']);
    $telephone = sanitize($_POST['telephone']);
    $email = sanitize($_POST['email']);

    if(empty($title) || empty($mobile)){
        set_flash_msg("Title and Mobile fields are mandatory.");
        redirect('add-contact');
        die();
    }
    else{
        $post_array = [
            'title' => $title,
            'designation' => $designation,
            'mobile' => $mobile,
            'telephone' => $telephone,
            'email' => $email
        ];

        

        Data::add_contact($post_array);
        redirect('dashboard');
    }

}

view('add-contact');