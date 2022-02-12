<?php

session_start();

require('app/app.php');

$id = sanitize($_GET['contact_id']);

$contact = Data::get_contact($id);

$view_parameter['page_title'] = "Contact Details";

view('detail-contact', true, $contact[0]);