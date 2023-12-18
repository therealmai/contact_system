<?php

const HOST = 'localhost';
define('DB_NAME', 'contact_system');
define('USERNAME', 'root');
const PASSWORD ='';


// try{
    $mysqli = new mysqli(HOST,USERNAME,PASSWORD,DB_NAME);
    // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

?>