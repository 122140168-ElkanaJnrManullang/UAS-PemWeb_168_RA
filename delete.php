<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM inventory WHERE id = $id";
    $conn->query($query);
    header('Location: index.php');
}
?>