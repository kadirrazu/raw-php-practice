<?php 

//Set applicaton path, plus a directory higher than it
define('APP_PATH', dirname(__FILE__) . '/../');

$view_data = [];

$view_data['navbar'] = true;

require("config.php");
require("functions.php");
require("data/data_functions.php");