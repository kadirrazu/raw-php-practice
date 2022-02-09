<?php

session_start();

//Controller File. This file will contain only logical parts. No view statements here.

//Load all required partial files
require("app/app.php");

//Get all data for parsing in INDEX page
$terms = get_terms();

//Assuming no search action for INDEX page
$is_search = 0;
$query_string = "";

//If search query is set ON, then replace DATA with search result
if(isset($_GET['search'])){
    $search_query = sanitize($_GET['search']);
    $terms = get_search_terms( $search_query );
    $is_search = 1;
    $query_string = $search_query;
}

//Pack an array with TEXT parameters
$view_data['title'] = 'Glossary';
$view_data['isSearch'] = $is_search;
$view_data['queryString'] = $query_string;

//Load the view and pass the model in it
view("index", $terms);
