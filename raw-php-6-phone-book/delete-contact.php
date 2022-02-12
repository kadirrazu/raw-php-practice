<?php

session_start();

require('app/app.php');

$id = sanitize($_GET['contact_id']);

$view_parameter['page_title'] = "Delete contact";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = sanitize($_POST['id']);

    Data::delete_contact($id);

    redirect('dashboard');

}

$contact = Data::get_contact($id);

view('delete-contact', true, $contact[0]);