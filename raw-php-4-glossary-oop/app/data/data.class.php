<?php

require("dataprovider.class.php");

class Data{
    
    static private $ds;

    static public function initialize(DataProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_term($term){
        return self::$ds->get_term($term);
    }

    static public function get_terms(){
        return self::$ds->get_terms();
    }

    static public function get_search_terms($string){
        return self::$ds->get_search_terms($string);
    }

    static public function add_term($term, $defination){
        return self::$ds->add_term($term, $defination);
    }

    static public function update_term($old_term, $new_term, $defination){
        return self::$ds->update_term($old_term, $new_term, $defination);
    }

    static public function delete_term($key){
        return self::$ds->delete_term($key);
    }

}