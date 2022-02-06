<?php

//Controller File. This file will contain only logical parts. No view statements here.

require("functions.php");

$title = "Index Page, from CONTROLLER";

view("index", $title);
