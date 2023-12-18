<?php
require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure all fields are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Retrieve user input
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the username and encrypted password match in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Passwords match, set session variables and redirect to contact page
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ../public/views/contact.php');
                exit;
            }
        }

        // Authentication failed, redirect back to login page with an error message
        header('Location: ../public/views/login.php?error=1');
        exit;
    }
}
?>