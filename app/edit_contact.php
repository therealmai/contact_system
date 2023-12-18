<?php

require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_SESSION['user_id'];


    $contact_id = $_POST['contact_id'];
    $name = $_POST['edit_name'];
    $company = $_POST['edit_company'];
    $phone = $_POST['edit_phone'];
    $email = $_POST['edit_email'];


    $sql = "UPDATE contacts SET name = '$name', company = '$company', phone = '$phone', email = '$email' WHERE id = $contact_id AND user_id = $user_id";
    $conn->query($sql);

  
    header('Location: ../public/views/contact.php');
    exit;
}
?>