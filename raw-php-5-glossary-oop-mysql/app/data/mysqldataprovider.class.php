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

        //Reset prepared statement and $db object to null
        $smt = null;
        $db = null;

        return $data[0];

    }

    //Get json data as TEXTS and return array of objects for parsing with foreach loop
    public function get_terms(){

        $data = $this->query("SELECT * FROM terms");

        return $data;

    }

    //Find out search result, if matched
    public function get_search_terms($string){
        
        $data = $this->query(
            "SELECT * FROM terms WHERE term LIKE :string OR defination LIKE :string",
            [
                ':string' => '%'. $string .'%'
            ]
        );

        return $data;

    }

    //Add a new term in our database table 'terms'
    public function add_term($term, $defination){

        $this->execute(
            'INSERT INTO terms(term, defination) VALUES(:term, :defination)',
            [
                ':term' => $term,
                ':defination' => $defination
            ]
        );

    }

    //Update a term
    public function update_term($old_term, $new_term, $defination){

        $this->execute(
            'UPDATE terms SET term = :term, defination = :defination WHERE id = :id',
            [
                ':term' => $new_term,
                ':defination' => $defination,
                ':id' => $old_term
            ]
        );

    }

    //Function for deleting a term
    public function delete_term($key){

        $this->execute(
            'DELETE FROM terms WHERE id = :id',
            [
                ':id' => $key
            ]
        );

    }

    //Private: Query the database with specified $sql, $sql_param[]
    //Return the query result as $data
    private function query($sql, $sql_param = []){
        
        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return without doing anything
        if($db == null){
            return [];
        }

        if(empty($sql_param)){
            //Just execute the provided $sql query. Like for SELECT * FROM table_name
            $query = $db->query($sql);
        }
        else{
            //Prepare the statement using prepare() method, and store it to $smt for execution next
            $query = $db->prepare($sql);

            //Execute the prepared statement. supply our values variable then map it with user provided variables
            $query->execute($sql_param);
        }
        

        //This will give us an array of GlossaryTerm objects.
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        //Reset prepared statement and $db object to null
        $query = null;
        $db = null;

        return $data;

    }


    //Private: Just execute a $sql query with specified $sql, $sql_param[]
    //No return of data or query result
    private function execute($sql, $sql_param = []){
        
        //Connect To the database first
        $db = $this->connect();

        //If database connection fails, then simply return nothing
        if($db == null){
            return;
        }

        //Prepare the statement using prepare() method, and store it to $smt for execution next
        $smt = $db->prepare($sql);

        //Execute the prepared statement. supply our values variable then map it with user provided variables
        $smt->execute($sql_param);

        //Reset prepared statement and $db object to null
        $smt = null;
        $db = null;

    }

    //Connect to the database with PDO
    //Return null, if it fails to connect
    private function connect(){
        try{
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        }catch(PDOException $e){
            return null;
        }
    }

}