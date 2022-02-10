<?php 

require("glossaryterm.class.php");

class DataProvider{
    
    function __construct($source){
        $this->source = $source;
    }
    
    //Find out search result, if matched
    public function get_search_terms($string){

    }

    //Get a single term as per query string provided
    public function get_term($term){

    }

    //Get json data as TEXTS and return array of objects for parsing with foreach loop
    public function get_terms(){

    }

    //Add a new term in our data array. Data array holds array of term objects
    public function add_term($term, $defination){
        
    }

    //Update a term
    public function update_term($old_term, $new_term, $defination){

    }

    //Function for deleting a term
    public function delete_term($key){

    }
}