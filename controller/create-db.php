<?php
    require_once '../model/database.php'; //connects this file to create-db.php file

    $connection = new mysqli($host, $user, $password); //enables us to enact us information from our sql server stored in the connection variable