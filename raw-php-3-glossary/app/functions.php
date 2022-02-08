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

//Check if logged in
function is_logged_in(){
    if(!isset($_SESSION['user_email'])){
        return false;
    }

    return true;
}

//Check if there is any flash message set
function if_flash_msg(){
    if(isset($_SESSION['flash_msg']) && $_SESSION['flash_msg'] != ""){
        return true;
    }

    return false;
}

//Set flash message in session
function set_flash_msg($text){
    $_SESSION['flash_msg'] = $text;
}

//Get flash message in session
function get_flash_msg(){
    return $_SESSION['flash_msg'];
}

//Delete flash message
function delete_flash_msg(){
    $_SESSION['flash_msg'] = "";
}

//Set page title with provided string
function set_page_title($text){
    global $view_data;
    $view_data['title'] = $text;
}

//Redirect unauthorised users to login page
function redirect_for_login(){
    set_flash_msg(CONFIG["restrict_msg"]);
    set_page_title("Administrator Login");
    redirect("login");
    die();
}

//Logout a user
function logout(){
    session_unset();
    session_destroy();
    set_page_title("Administrator Login");
    redirect("login");
    die();
}