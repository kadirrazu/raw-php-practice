<?php

session_start();

require("../app/app.php");

if(!is_logged_in()){
    redirect_for_login();
}

//Pack a view_data array with TEXT parameters
set_page_title("Administrator Dashboard");

view( "admin/index", get_terms() );