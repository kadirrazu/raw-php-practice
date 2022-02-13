<?php

//Base DataProvider class. This class will be inherited in implementing child class
class DataProvider{

    function __construct(public $source, public $db_username, public $db_password) {}

    public function get_contacts(){}

    public function get_contact($id){}

    public function add_contact($post = []){}

    public function search_contact($id){}

    public function edit_contact($id, $post = []){}

    public function delete_contact($id){}

}