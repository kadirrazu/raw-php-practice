<?php

require("../app/app.php");

//Assuming no search action for INDEX page
$is_search = 0;
$query_string = "";

//Pack an array with TEXT parameters
$view_data = [
    'title' => 'Glossary: Admin Page',
    'isSearch' => $is_search,
    'queryString' => $query_string
];

view( "admin/index", get_terms() );