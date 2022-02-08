<?php

require("../app/app.php");

//Pack an array with TEXT parameters
$view_data = [
    'title' => 'Glossary Admin: Delete a Term'
];

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

    view( "admin/delete", $data);
    
}

if( is_post() ){
    if(empty($_POST['delete-term'])){
        //Go back to add term page and show an error
    }
    else{
        $delete_term = sanitize($_POST['delete-term']);
        delete_term($delete_term);
        redirect("index");
    }
}
