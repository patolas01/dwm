<?php
include '../sqli/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM feedback WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('location: feedback.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>