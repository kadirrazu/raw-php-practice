<?php

define('APP_PATH', dirname(__FILE__) . "/../");

require('config.php');
require('functions.php');
require("database/data.class.php");
require("database/mysqldataprovider.class.php");

Data::initialize(new MysqlDataProvider(CONFIG['db'], CONFIG['db_user'], CONFIG['db_password']));