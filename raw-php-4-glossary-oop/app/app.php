<?php 

//Set applicaton path, plus a directory higher than it
define('APP_PATH', dirname(__FILE__) . '/../');

$view_data = [];

$view_data['navbar'] = true;

require("config.php");
require("functions.php");
require("data/filedataprovider.class.php");
require("data/data.class.php");


Data::initialize(new FileDataProvider(CONFIG['data_file']));