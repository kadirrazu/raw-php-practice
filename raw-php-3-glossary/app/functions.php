<?php

//Serve a view mentioed with $page. Format. $page.view.php
function view($page, $data = ""){
    global $view_data;
    require("views/layout.view.php");
}