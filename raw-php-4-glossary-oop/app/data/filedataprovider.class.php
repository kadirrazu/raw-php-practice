<?php

require("glossaryterm.class.php");

class FileDataProvider extends DataProvider{
    
    //Find out search result, if matched
    public function get_search_terms($string){
        $items = $this->get_terms();

        $results = array_filter($items, function($item) use($string){
            if( strpos($item->term, $string) !== false || strpos($item->defination, $string) ){
                return $item;
            }
        });

        return $results;
    }

    //Get a single term as per query string provided
    public function get_term($term){
        $terms = $this->get_terms();

        foreach($terms as $item){
            if($item->term == $term){
                return $item;
            }
        }

        return false;
    }

    //Get json data as TEXTS and return array of objects for parsing with foreach loop
    public function get_terms(){
        $json =  $this->get_data();
        return json_decode($json);
    }

    //Add a new term in our data array. Data array holds array of term objects
    public function add_term($term, $defination){
        
        $data = $this->get_terms();
        
        $data[] = new GlossaryTerm($term, $defination);

        $this->set_terms($data);

    }

    //Update a term
    public function update_term($old_term, $new_term, $defination){
        
        $terms = $this->get_terms();

        foreach($terms as $item){
            if($item->term == $old_term){
                $item->term = $new_term;
                $item->defination = $defination;
                break;
            }
        }

        $this->set_terms($terms);

    }

    //Function for deleting a term
    public function delete_term($key){
        $terms = $this->get_terms();

        for($i=0; $i < count($terms); $i++){
            if($terms[$i]->term == $key){
                unset($terms[$i]);
            }
        }

        $refreshly_indexed_terms = array_values($terms);

        $this->set_terms($refreshly_indexed_terms);
    }

    //Get JSON data as TEXTS from mentioned file.
    private function get_data(){

        $json = "";

        if(!file_exists($this->source)){
            file_put_contents($this->source, "");
        }
        else{
            $json = file_get_contents($this->source);
        }

        return $json;
    }

    //Add a new term to the file
    private function set_terms($data){
        $json = json_encode($data);
        file_put_contents($this->source, $json);
    }

}