<?php
require_once '../db_conn.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure all fields are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Retrieve user input
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
        
        echo $username;
        echo $password;

        // Insert user data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($mysqli, $sql)) {
            header("location: ../public/views/login.php");
        } else {
        echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
    } else {
        echo "All fields are required.";
    }
}
?>
