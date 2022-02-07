<?php

//Redirect to a specific URL
function redirect($url){
    header("Location: $url.php");
    die();
}

//Serve a view mentioed with $page. Format. $page.view.php
function view($page, $data = ""){
    global $view_data;
    require("views/layout.view.php");
}