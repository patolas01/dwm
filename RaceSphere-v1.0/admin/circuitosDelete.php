<?php
include '../sqli/conn.php';

$id_circuito = $_GET['id'];

$sql = "DELETE FROM circuito WHERE id_circuito = '$id_circuito'";

if ($conn->query($sql) === TRUE) {
    header('location: circuitos.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
