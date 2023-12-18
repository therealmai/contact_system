<?php

require_once '../../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {

    session_start();
    $user_id = $_SESSION['user_id'];

    $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $contactsPerPage = 5;
    $offset = ($page - 1) * $contactsPerPage;

    $sql = "SELECT * FROM contacts WHERE user_id = $user_id AND name LIKE '%$searchTerm%' LIMIT $contactsPerPage OFFSET $offset";
    $result = $conn->query($sql);

    $contacts = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($contacts as $contact) {
        echo '<tr>';
        echo '<td>' . $contact['id'] . '</td>';
        echo '<td>' . $contact['name'] . '</td>';
        echo '<td>' . $contact['company'] . '</td>';
        echo '<td>' . $contact['phone'] . '</td>';
        echo '<td>' . $contact['email'] . '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editContactModal' . $contact['id'] . '">Edit</button>';
        echo '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteContactModal' . $contact['id'] . '">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
}
?>