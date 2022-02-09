<?php

session_start();

require("../app/app.php");

if(!is_logged_in()){
    redirect_for_login();
}

//Pack a view_data array with TEXT parameters
set_page_title("Glossary Admin: Edit a Term");

if( is_get() ){

    $key = sanitize($_GET["key"]);

    if(empty($key)){
        view("404");
        die();
    }

    $data = get_term($key);

    if($data === false){
        view("404");
        die();
    }

    view( "admin/edit", $data);
    
}

if( is_post() ){
    if(empty($_POST['term']) || empty($_POST['defination'])){
        //Go back to add term page and show an error
    }
    else{
        $new_term = sanitize($_POST['term']);
        $defination = sanitize($_POST['defination']);
        $old_term = sanitize($_POST['original-term']);
        update_term($old_term, $new_term, $defination);
        redirect("index");
    }
}
