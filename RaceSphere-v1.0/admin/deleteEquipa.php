<?php
include '../sqli/conn.php';

$idequipa = $_POST['idequipa'];

$sql = "DELETE FROM equipa WHERE id_equipa = '$idequipa'";

if ($conn->query($sql) === TRUE) {
    header('location: equipas.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

?> 