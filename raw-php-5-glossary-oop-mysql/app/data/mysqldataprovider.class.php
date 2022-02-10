<?php 

class MySqlDataProvider extends DataProvider{

    //Get a single term as per query string provided
    public function get_term($term){

        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return without doing anything
        if($db == null){
            return;
        }

        $sql = 'SELECT * FROM terms WHERE id = :id';

        //Prepare the statement using prepare() method, and store it to $smt for execution next
        $smt = $db->prepare($sql);

        //Execute the prepared statement. supply our values variable then map it with user provided variables
        $smt->execute([
            ':id' => $term
        ]);

        //This will give us an array of GlossaryTerm objects.
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        if(count($data) < 1){
            return [];
        }

        //Reset prepared statement or query
        $smt = null;

        //Reset database connection
        $db = null;

        return $data[0];

    }

    //Get json data as TEXTS and return array of objects for parsing with foreach loop
    public function get_terms(){

        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return without doing anything
        if($db == null){
            return [];
        }

        $sql = 'SELECT * FROM terms';

        $query = $db->query($sql);

        //This will give us an array of GlossaryTerm objects.
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        //Reset prepared statement or query
        $query = null;

        //Reset database connection
        $db = null;

        return $data;

    }

    //Find out search result, if matched
    public function get_search_terms($string){
        
        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return without doing anything
        if($db == null){
            return;
        }

        $sql = 'SELECT * FROM terms WHERE term LIKE :term';

        //Prepare the statement using prepare() method, and store it to $smt for execution next
        $smt = $db->prepare($sql);

        //Execute the prepared statement. supply our values variable then map it with user provided variables
        $smt->execute([
            ':term' => "%$string%"
        ]);

        //This will give us an array of GlossaryTerm objects.
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        //Reset prepared statement or query
        $smt = null;

        //Reset database connection
        $db = null;

        return $data;

    }

    //Add a new term in our database table 'terms'
    public function add_term($term, $defination){

        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return without doing anything
        if($db == null){
            return;
        }

        //Write a sql query for inserting values into the terms table
        //:term and :defination are variables to avoid SQL injection (in case of using user input directly)
        $sql = 'INSERT INTO terms(term, defination) VALUES(:term, :defination)';

        //Prepare the statement using prepare() method, and store it to $smt for execution next
        $smt = $db->prepare($sql);

        //Execute the prepared statement. supply our values variable then map it with user provided variables
        $smt->execute([
            ':term' => $term,
            ':defination' => $defination
        ]);

        //Reset prepared statement
        $smt = null;

        //Reset database connection
        $db = null;

    }

    //Update a term
    public function update_term($old_term, $new_term, $defination){

    }

    //Function for deleting a term
    public function delete_term($key){

    }

    //Connect to the database
    private function connect(){
        try{
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        }catch(PDOException $e){
            return null;
        }
    }
}