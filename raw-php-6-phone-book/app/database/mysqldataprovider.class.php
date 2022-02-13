<?php

//Main class for dealing with MySQL database
class MySqlDataProvider extends DataProvider{

    //Get all contacts
    public function get_contacts(){

        $sql = 'SELECT * FROM contacts ORDER BY title ASC';
      
        $data = $this->perform_db_query($sql);

        return $data;

    }

    //Get a single contact based on provided $id
    public function get_contact($id){

        $sql = 'SELECT * FROM contacts WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        $data = $this->perform_db_query($sql, $param);

        return $data;

    }

    //Add a new contact to 'contacts' table
    public function add_contact($post = []){
            
        if(count($post) > 0){
            $this->save_contact($post);
        }
        else{
            return;
        }
    }

    //Search for a contact with supplied $search string
    public function search_contact($search){

        $sql = 'SELECT * FROM contacts WHERE title LIKE :search OR designation LIKE :search OR mobile LIKE :search OR telephone LIKE :search or email LIKE :search';

        $param = [
            ':search' => '%'.$search.'%'
        ];

        $data = $this->perform_db_query($sql, $param);

        return $data;

    }

    //Edit a contact
    //$id is the existing contact's ID
    //$post is an array of Updated Information
    public function edit_contact($id, $post = []){
        
        if(count($post) > 0){
            $this->update_contact($id, $post);
        }
        else{
            return;
        }
        
    }

    //Delete a contact from 'contacts' table based on provided $id
    public function delete_contact($id){

        $sql = 'DELETE FROM contacts WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        $this->perform_db_execute($sql, $param);
        
    }

    //DB Connection and DB object
    private function connect($username, $password){
        try{
            return new PDO($this->source, $username, $password);
        }catch(PDOException $e){
            echo "Database Error: " . $e->getMessage();
            die();
        }
    }

    //Save a contact to the database table 'contacts'
    private function save_contact($array){

        $sql = 'INSERT INTO contacts (title, designation, mobile, telephone, email) VALUES (:title, :designation, :mobile, :telephone, :email)';

        $param = [
            ':title' => $array['title'],
            ':designation' => $array['designation'],
            ':mobile' => $array['mobile'],
            ':telephone' => $array['telephone'],
            ':email' => $array['email']
        ];

        $this->perform_db_execute($sql, $param);

    }

    //Update an existing contact
    private function update_contact($id, $post){

        $sql = 'UPDATE contacts SET title = :title, designation = :designation, mobile = :mobile, telephone = :telephone, email = :email WHERE id = :id';

        $param = [
            ':title' => $post['title'],
            ':designation' => $post['designation'],
            ':mobile' => $post['mobile'],
            ':telephone' => $post['telephone'],
            ':email' => $post['email'],
            ':id' => $id
        ];

        $this->perform_db_execute($sql, $param);

    }

    //Perform a DB query with supplied $sql and it's $parameter
    //Will return contacts array after performing the query
    private function perform_db_query($sql, $parameter = []){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($parameter);

        $data = $smt->fetchAll();

        $smt = null;
        $db = null;

        return $data;
    }

    //Perform an DB execute task. No data will be returned
    private function perform_db_execute($sql, $parameter = []){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($parameter);

        $smt = null;
        $db = null;

    }

} //End of the CLASS