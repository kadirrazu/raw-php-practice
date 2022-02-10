<?php

const CONFIG = [
    "data_file" => APP_PATH . "data.json",
    "db" => "mysql:dbname=glossary;host=localhost;port=3306",
    "db_user" => "root",
    "db_password" => "",
    "users" => [
        "admin@url.com" => "123456",
        "kadirrazu@github.com" => "123456"
    ],
    "restrict_msg" => "Please login to access restricted area.",
];