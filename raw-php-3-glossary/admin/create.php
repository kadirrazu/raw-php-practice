<?php

require("../app/app.php");

if( is_post() ){
    if(empty($_POST['term']) || empty($_POST['defination'])){
        //Go back to add term page and show an error
    }
    else{
        $term = sanitize($_POST['term']);
        $defination = sanitize($_POST['defination']);
        add_term($term, $defination);
        redirect("index");
    }
}

//Pack an array with TEXT parameters
$view_data = [
    'title' => 'Glossary Admin: Create a Term'
];

view( "admin/create");