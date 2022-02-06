<?php

function get_data(){
    $fname = CONFIG['data_file'];

    $json = "";

    if(!file_exists($fname)){
        //Instead of using below two lines, we can simply use file_put_contents($fname, '');
        $handle = fopen($fname, "w+");
        fclose($handle);  
    }
    else{
        //Instead of using below three lines, we can simply use $json = file_get_contents($fname);
        $handle = fopen($fname, "r");
        $json = fread($handle, filesize($fname));
        fclose($handle);
    }

    return $json;
}

function view($page, $data = ""){
    require("views/layout.view.php");
}