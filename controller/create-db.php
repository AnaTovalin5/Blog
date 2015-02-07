<?php
    require_once (__DIR__ . '/../model/config.php'); //connects this file to create-db.php file
   
    //creates new table with the columns id(primary key), title, and post
    $query = $_SESSION["connection"]->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title varchar(255) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))");
    
    if ($query) { //checks if the table has been created
        echo "<p>Succesfully created table: posts</p>"; //if true then a success message displays onto the screen
    } else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>"; //if false displays error message
    }
    
    $query = $_SESSION["connection"]->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "username varchar(30) NOT NULL,"
            . "email varchar(50) NOT NULL,"
            . "password char(128) NOT NULL,"
            . "salt char(128) NOT NULL,"
            . "PRIMARY KEY (id))");
    
    if ($query) {
        echo "<p>Successfully created table: users</p>";
    } else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }