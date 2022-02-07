<?php

//Controller File. This file will contain only logical parts. No view statements here.

require("app/app.php");

$terms = get_terms();

$view_data = [
    'title' => 'Glossary : Home Page'
];

view("index", $terms);
