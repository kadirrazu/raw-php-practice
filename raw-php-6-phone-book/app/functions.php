<?php

function view($url, $template = true, $model = null){

    global $view_parameter;
    
    if($template === false){
        require( APP_PATH . "views/$url.view.php" );
    }
    else{
        require( APP_PATH . "views/layout.view.php" );
    }
        
}

function sanitize($text){
    return filter_var($text, FILTER_SANITIZE_STRING);
}

function redirect($url){
    $redirect_url = $url.".php";
    header("Location: $redirect_url");
}

function is_logged_in(){
    $logged_in = false;

    if(isset($_SESSION['user_email'])){
        $logged_in = true;
    }

    return $logged_in;
}

function logout(){
    session_unset();
    session_destroy();
    redirect('index');
}

function if_flash_msg(){

    if(isset($_SESSION['flash_msg']) && isset($_SESSION['flash_msg']) != ""){
        return true;
    }

    return false;
}

function get_flash_msg(){
    return $_SESSION['flash_msg'];
}

function set_flash_msg($text){
    $_SESSION['flash_msg'] = $text;
}

function delete_flash_msg(){
    $_SESSION['flash_msg'] = null;
}

function set_session_data($param, $text){
    $_SESSION["$param"] = $text;
}

function authenticate($email, $password){
    $result = false;
    
    foreach(CONFIG['users'] as $user_email => $user_password){
        if($user_email == $email && $user_password == $password){
            set_session_data('user_email', $email);
            $result = true;
            break;
        }
    }

    return $result;
}

