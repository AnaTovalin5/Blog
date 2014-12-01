<?php
    require_once (__DIR__ . '/../model/database.php'); //connects this file to create-db.php file

    $connection = new mysqli($host, $username, $password); //enables us to get information from our sql server stored in the connection variable
    
    if ($connection->connect_error) {   //watches for connection error
        die("Error: ". $connection->connect_error); //kills connection if there is an error
    }
    
    $exists = $connection->select_db($database);  //stores value of TRUE or FALSE that the database does or does not exists
    
    if(!$exists) { //checks if the database doesn't exist
       $query = $connection->query("CREATE DATABASE $database"); //Creates database and stores result into query 
    
       if($query) { //checks if the query was true
           echo "Successfully created database: " . $database; //if true then a success message is displayed onto the screen
       }
    } else {
        echo "Database already exists."; //if false then already exists message is displayed onto the screen
    }
    
    $connection->close(); //closes server connection