<?php
include '../sqli/conn.php';

$id_piloto = $_GET['id'];

$sql = "DELETE FROM piloto WHERE id_piloto = '$id_piloto'";

if ($conn->query($sql) === TRUE) {
    header('location: piloto.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>