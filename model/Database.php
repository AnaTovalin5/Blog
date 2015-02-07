<?php
class Database {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;


    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        
        $this->connection = new mysqli($host, $username, $password); //enables us to get information from our sql server stored in the connection variable
    
        if ($this->connection->connect_error) {   //watches for connection error
            die("<p>Error: ". $this->connection->connect_error. "</p>"); //kills connection if there is an error
        }

        $exists = $this->connection->select_db($database);  //stores value of TRUE or FALSE that the database does or does not exists

        if (!$exists) { //checks if the database doesn't exist
           $query = $this->connection->query("CREATE DATABASE $database"); //Creates database and stores result into query 

           if ($query) { //checks if the query was true
               echo "Successfully created database: " . $database."</p>"; //if true then a success message is displayed onto the screen
           }
        } else {
            echo "<p>Database already exists.</p>"; //if false then already exists message is displayed onto the screen
        }
    }
    
    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
    
        if ($this->connection->connect_error) {   //watches for connection error
            die("<p>Error: ". $this->connection->connect_error. "</p>"); //kills connection if there is an error
        }            
    }
    
    public function closeConnection() {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }
    
    public function query($string) {
        $this->openConnection();
        
        $query = $this->connection->query($string);
        
        if ($query) {
            $this->error = $this->connection->error;
        }
        
        $this->closeConnection();
        
        return $query;
    }
}

