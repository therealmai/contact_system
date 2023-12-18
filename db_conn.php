<?php
// Database connection (replace with your actual database credentials)
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "contact_system";

$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>