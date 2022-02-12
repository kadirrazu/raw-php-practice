<?php

session_start();

require('app/app.php');

if(!is_logged_in()){
    redirect('index');
}

$view_parameter['page_title'] = "Dashboard";

$data = "";

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])){
    $search = sanitize($_GET['search']);
    $data = Data::search_contact($search);
    $view_parameter['page_title'] = "Search results for - " . $search;
}
else{
    $data = Data::get_contacts();
}

view('dashboard', true,  $data);