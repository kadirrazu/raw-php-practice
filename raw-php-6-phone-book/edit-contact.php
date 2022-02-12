<?php

session_start();

require('app/app.php');

$id = sanitize($_GET['contact_id']);

$view_parameter['page_title'] = "Edit contact";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = sanitize($_POST['id']);

    $title = sanitize($_POST['title']);
    $designation = sanitize($_POST['designation']);
    $mobile = sanitize($_POST['mobile']);
    $telephone = sanitize($_POST['telephone']);
    $email = sanitize($_POST['email']);

    if(empty($title) || empty($mobile)){
        set_flash_msg("Title and Mobile fields are mandatory.");
        redirect('dashboard');
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

        //var_dump($post_array); die();

        Data::edit_contact($id, $post_array);

        redirect('dashboard');
    }

}

$contact = Data::get_contact($id);

view('edit-contact', true, $contact[0]);