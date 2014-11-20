<?php
    require_once (__DIR__ . '/../model/database.php'); //connects this file to create-db.php file

    $connection = new mysqli($host, $username, $password); //enables us to get information from our sql server stored in the connection variable
    
    if ($connection->connect_error) {   //watches for connection error
        die("Error: ". $connection->connect_error); //kills connection if there is an error
    } else {
        echo "Success". $connection->host_info; //successful connection message
    }
    
    $connection->close(); //closes server connection