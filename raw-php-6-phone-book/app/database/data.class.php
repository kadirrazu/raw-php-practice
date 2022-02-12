<?php

require('dataprovider.class.php');

class Data{

    static private $ds;

    static public function initialize(DataProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_contacts(){
        return self::$ds->get_contacts();
    }

    static public function get_contact($id){
        return self::$ds->get_contact($id);
    }

    static public function add_contact($post){
        return self::$ds->add_contact($post);
    }

    static public function search_contact($id){
        return self::$ds->search_contact($id);
    }

    static public function edit_contact($id, $post = []){
        return self::$ds->edit_contact($id, $post);
    }

    static public function delete_contact($id){
        return self::$ds->delete_contact($id);
    }
    
}