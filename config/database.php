<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'lucas';

    $conn = new mysqli($host, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    CONST DEFAULT_PASSWORD = 'Default@123';

    session_start();
?>