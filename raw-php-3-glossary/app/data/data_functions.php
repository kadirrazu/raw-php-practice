<?php

//Get a single term as per query string provided
function get_term($term){
    $terms = get_terms();

    foreach($terms as $item){
        if($item->term == $term){
            return $item;
        }
    }

    return false;
}

//Get json data as TEXTS and return array of objects for parsing with foreach loop
function get_terms(){
    $json =  get_data();
    return json_decode($json);
}

//Get JSON data as TEXTS from mentioned file.
function get_data(){
    $fname = CONFIG['data_file']; //From configuration file config.php

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