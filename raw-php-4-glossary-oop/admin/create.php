<?php

session_start();

require("../app/app.php");

if(!is_logged_in()){
    redirect_for_login();
}

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

//Pack a view_data array with TEXT parameters
set_page_title("Glossary Admin: Create a Term");

view( "admin/create");