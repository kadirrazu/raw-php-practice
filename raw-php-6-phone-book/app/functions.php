<?php

/*All user defined functions*/

//Load a vire page
function view($url, $template = true, $model = null){

    global $view_parameter;
    
    if($template === false){
        require( APP_PATH . "views/$url.view.php" );
    }
    else{
        require( APP_PATH . "views/layout.view.php" );
    }
        
}

//Sanitize a supplied string
function sanitize($text){
    return filter_var($text, FILTER_SANITIZE_STRING);
}

//Redirect to an specific page
function redirect($url){
    $redirect_url = $url.".php";
    header("Location: $redirect_url");
}

//Check if the user is already logged in
function is_logged_in(){
    $logged_in = false;

    if(isset($_SESSION['user_email'])){
        $logged_in = true;
    }

    return $logged_in;
}

//Logout a user from his session
//Redirect him to login page.
function logout(){
    session_unset();
    session_destroy();
    redirect('index');
}

//Check if there is any flash message set
function if_flash_msg(){

    if(isset($_SESSION['flash_msg']) && isset($_SESSION['flash_msg']) != ""){
        return true;
    }

    return false;
}

//Get flash message
function get_flash_msg(){
    return $_SESSION['flash_msg'];
}

//Set a flash message as per supplied string
function set_flash_msg($text){
    $_SESSION['flash_msg'] = $text;
}

//Delete an existing flash message
function delete_flash_msg(){
    $_SESSION['flash_msg'] = null;
}

//Set any sesion parameter with supplied string as value
function set_session_data($param, $text){
    $_SESSION["$param"] = $text;
}

//Authenticate an user : Login
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

