<?php
require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

  

    $sql = "INSERT INTO contacts (user_id, name, company, phone, email) VALUES ('$user_id', '$name', '$company', '$phone', '$email')";
    $conn->query($sql);


    header('Location: ../public/views/contact.php');
    exit;
}
?>
