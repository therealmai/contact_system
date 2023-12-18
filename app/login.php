<?php
require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['password'])) {
 
        $username = $_POST['username'];
        $password = $_POST['password'];

     
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
              
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ../public/views/contact.php');
                exit;
            }
        }

    
        header('Location: ../public/views/login.php?error=1');
        exit;
    }
}
?>