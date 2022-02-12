<?php

class MySqlDataProvider extends DataProvider{

    public function get_contacts(){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return [];
        }

        $sql = 'SELECT * FROM contacts ORDER BY title ASC';

        $smt = $db->prepare($sql);

        $smt->execute();

        $data = $smt->fetchAll();

        $smt = null;
        $db = null;

        return $data;

    }

    public function get_contact($id){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return [];
        }

        $sql = 'SELECT * FROM contacts WHERE id = :id';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id
        ]);

        $data = $smt->fetchAll();

        $smt = null;
        $db = null;

        return $data;

    }

    public function add_contact($post = []){
            
        if(count($post) > 0){
            $this->save_contact($post);
        }
        else{
            return;
        }
    }

    public function search_contact($search){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return [];
        }

        $sql = 'SELECT * FROM contacts WHERE title LIKE :search OR designation LIKE :search OR mobile LIKE :search OR telephone LIKE :search or email LIKE :search';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':search' => '%'.$search.'%'
        ]);

        $data = $smt->fetchAll();

        $smt = null;
        $db = null;

        return $data;

    }

    public function edit_contact($id, $post = []){
        
        if(count($post) > 0){
            $this->update_contact($id, $post);
        }
        else{
            return;
        }
        
    }

    public function delete_contact($id){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return [];
        }

        $sql = 'DELETE FROM contacts WHERE id = :id';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id
        ]);

        $smt = null;
        $db = null;

    }

    private function connect($username, $password){
        return new PDO($this->source, $username, $password);
    }

    private function save_contact($array){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return;
        }

        $sql = 'INSERT INTO contacts (title, designation, mobile, telephone, email) VALUES (:title, :designation, :mobile, :telephone, :email)';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':title' => $array['title'],
            ':designation' => $array['designation'],
            ':mobile' => $array['mobile'],
            ':telephone' => $array['telephone'],
            ':email' => $array['email']
        ]);

        $smt = null;
        $db = null;

    }

    private function update_contact($id, $post){

        $db = $this->connect($this->db_username, $this->db_password);

        if($db == null){
            return;
        }

        $sql = 'UPDATE contacts SET title = :title, designation = :designation, mobile = :mobile, telephone = :telephone, email = :email WHERE id = :id';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':title' => $post['title'],
            ':designation' => $post['designation'],
            ':mobile' => $post['mobile'],
            ':telephone' => $post['telephone'],
            ':email' => $post['email'],
            ':id' => $id
        ]);

        $smt = null;
        $db = null;

    }

}