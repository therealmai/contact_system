<?php

require_once '../../db_conn.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>