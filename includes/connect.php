<?php

    // Create our connection to the database

    $enviro = 'localhost';
    $uname = 'root';
    $password = 'root'; // for windows
    /*$password = 'root'; for mac */

    $db = 'db_bookstore';

    $connect = new mysqli($enviro, $uname, $password, $db);

    if(mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


?>