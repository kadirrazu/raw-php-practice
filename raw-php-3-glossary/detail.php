<?php

require("app/app.php");

if(!isset($_GET['term'])){
    redirect('index');
    die();
}

$query_string = filter_var($_GET['term'], FILTER_SANITIZE_STRING);

$data = get_term($query_string);

if(!$data){
    view("404");
    die();
}

//Pack an array with TEXT parameters
$view_data['title'] = "Glossary : Details for \"$data->term\"";

view("details", $data);
