<?php
    require_once (__DIR__ . '/../model/config.php'); //connects this file to create-db.php file

    $connection = new mysqli($host, $username, $password); //enables us to get information from our sql server stored in the connection variable
    
    if ($connection->connect_error) {   //watches for connection error
        die("<p>Error: ". $connection->connect_error. "</p>"); //kills connection if there is an error
    }
    
    $exists = $connection->select_db($database);  //stores value of TRUE or FALSE that the database does or does not exists
    
    if (!$exists) { //checks if the database doesn't exist
       $query = $connection->query("CREATE DATABASE $database"); //Creates database and stores result into query 
    
       if ($query) { //checks if the query was true
           echo "Successfully created database: " . $database."</p>"; //if true then a success message is displayed onto the screen
       }
    } else {
        echo "<p>Database already exists.</p>"; //if false then already exists message is displayed onto the screen
    }
    
    //creates new table with the columns id(primary key), title, and post
    $query = $connection->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title varchar(255) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))");
    
    if ($query) { //checks if the table has been created
        echo "<p>Succesfully created table: posts</p>"; //if true then a success message displays onto the screen
    } else {
        echo "<p>$connection->error</p>"; //if false displays error message
    }
    
    $connection->close(); //closes server connection