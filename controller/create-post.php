<?php
    require_once (__DIR__ . "/../model/database.php");

    $connection = new mysqli($host, $username, $password, $database);
    
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING); //validates and sanitizes the title input
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);  //validates and sanitizes the post input

    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'"); //inserts row into 
    
    if ($query) {  //checks if query was succesfully sent
        echo "<p>Successfully inserted post: $title</p>";
    } else {
        echo "<p>$connection->error</p>";
    }
    
    $connection->close();