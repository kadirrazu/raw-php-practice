<?php

//Controller File. This file will contain only logical parts. No view statements here.

require("app/app.php");

$data =  get_data();

view("index", $data);
