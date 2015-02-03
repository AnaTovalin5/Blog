<?php
    $path = "/Blog/";
    
    //creates variables for database usage
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "blog_db";
    
    $connection = new Database($host, $username, $password, $database);
