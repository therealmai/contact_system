<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        header('Location: welcome.php');
        exit;
    } else {

        header('Location: index.php?error=1');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

?>
