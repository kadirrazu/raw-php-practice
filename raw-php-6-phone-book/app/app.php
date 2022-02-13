<?php

//Define application's BASE DIRECTORY PATH
define('APP_PATH', dirname(__FILE__) . "/../");

//Load the required includes
require('config.php');
require('functions.php');
require("database/data.class.php");
require("database/mysqldataprovider.class.php");

//Fire up globally accessible DATA class
Data::initialize(new MysqlDataProvider(CONFIG['db'], CONFIG['db_user'], CONFIG['db_password']));