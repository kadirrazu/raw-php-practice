<?php

//Redirect to a specific URL
function redirect($url){
    header("Location: $url.php");
    die();
}

//Serve a view mentioed with $page. Format. $page.view.php
function view($page, $data = ""){
    global $view_data;
    require( APP_PATH . "views/layout.view.php");
}

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === "POST";
}

function is_get()
{
    return $_SERVER['REQUEST_METHOD'] === "GET";
}

//Sanitize an input string
function sanitize($value){

    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);

    if($temp == false){
        return "";
    }

    return $temp;
}