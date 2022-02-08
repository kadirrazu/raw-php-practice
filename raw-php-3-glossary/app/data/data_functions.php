<?php

//Find out search result, if matched
function get_search_terms($string){
    $items = get_terms();

    $results = array_filter($items, function($item) use($string){
        if( strpos($item->term, $string) !== false || strpos($item->defination, $string) ){
            return $item;
        }
    });

    return $results;
}

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

//Add a new term
function add_term($term, $defination){
    $data = get_terms();
    $new_data = [
        "term" => $term,
        "defination" => $defination
    ];

    $object = (object) $new_data;

    $data[] = $object;

    set_terms($data);
}

//Add a new term to the file
function set_terms($data){
    $fname = CONFIG['data_file'];
    $json = json_encode($data);
    file_put_contents($fname, $json);
}

//Update a term
function update_term($old_term, $new_term, $defination){
    
    $terms = get_terms();

    foreach($terms as $item){
        if($item->term == $old_term){
            $item->term = $new_term;
            $item->defination = $defination;
            break;
        }
    }

    set_terms($terms);

}

//Function for deleting a term
function delete_term($key){
    $terms = get_terms();

    for($i=0; $i < count($terms); $i++){
        if($terms[$i]->term == $key){
            unset($terms[$i]);
        }
    }

    $refreshly_indexed_terms = array_values($terms);

    set_terms($refreshly_indexed_terms);
}